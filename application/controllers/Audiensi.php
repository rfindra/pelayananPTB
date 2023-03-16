<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audiensi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Audiensi_model');
    }

    public function indexweb() {

        $data['title'] = 'Audiensi';
        // Code to display the kepaniteraan.php page
        $this->load->view('/web/audiensi',$data);
    }

    function daftar_audiensi()
    {
        // Validate the form data
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nmlembaga', 'Nama Lembaga / Organisasi', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'Nomor Handphone / Whatsapp', 'required');
        $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required|trim|check_file_type[jpg,jpeg,png]');
        $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Audiensi', 'callback_check_file_type[pdf]|trim');



        if ($this->form_validation->run() == FALSE)
        {
            // If validation fails, display the form again with validation errors
            $this->load->view('/web/audiensi');
        }
        else
        {
            // If validation succeeds, save the form data to the database
            $data = array(
                'nik' => $this->input->post('nik'),
                'nmlkp' => $this->input->post('nmlkp'),
                'nmlembaga' => $this->input->post('nmlembaga'),
                'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
                'status' => $this->input->post('status')
            );

            // Upload the files and add their paths to the data array
            $foto_ktp_path = $this->upload_file('foto_ktp');
            $surat_permohonan_path = $this->upload_file('surat_permohonan');
            $data['foto_ktp'] = $foto_ktp_path;
            $data['surat_permohonan'] = $surat_permohonan_path;

            // Save the data to the database
            $this->Audiensi_model->simpan_data_audiensi($data);

            // Display a success message and redirect to a thank-you page
            $this->session->set_flashdata('success_msg', 'Data berhasil disimpan.');
            redirect('Audiensi/indexweb');
        }
    }

    function check_file_type($field, $type)
    {
        // Check that the uploaded file is of the specified type
        if (!isset($_FILES[$field]) || !isset($_FILES[$field]['type'])) {
            return FALSE;
        }
        $file_type = $_FILES[$field]['type'];
        if ($file_type != $type)
        {
            $this->form_validation->set_message('check_file_type', 'The %s field must be a %s file.');
            $this->form_validation->set_message('check_file_type', 'The %s field must be a %s file.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    

    private function upload_file($field_name)
    {
        $config['upload_path'] = './uploads/'; // Change the upload path as needed
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload($field_name)) {
            // If the upload fails, return the error message
            return $this->upload->display_errors();
        } else {
            // If the upload is successful, return the file name
            return $this->upload->data('file_name');
        }
    }
    

}
?>