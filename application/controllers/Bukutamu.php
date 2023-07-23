<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {
    
  public function __construct() {
      parent::__construct();
      
      $this->load->model('Bukutamu_model');
      $this->load->helper(array('form', 'url', 'html'));
      $this->load->library(array('upload', 'table'));
  }

  public function index() {
      $data = [
          'title' => 'Data Legalisasi',
          'data_legalisasi' => $this->Bukutamu_model->getAllDataLegalisasi()
      ];
      $this->load->view('admin/helpdesk', $data);
  }

  public function editLegalisasi($id) {
      $data = [
          'title' => 'Edit Legalisasi',
          'data_legalisasi' => $this->Bukutamu_model->getDataLegalisasiEdit($id)
      ];
      $this->load->view('admin/edit_legalisasi', $data);
  }

  public function updateLegalisasi($id) {
      $data = [
          'title' => 'Edit Legalisasi',
          'data_legalisasi' => $this->Bukutamu_model->getDataLegalisasiEdit($id)
      ];
      $this->load->view('admin/update_legalisasi', $data);
  }  
    
  function validateFormData() {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nohp', 'No Handphone', 'required|numeric');
    $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
    $this->form_validation->set_rules('tujuan', 'Tujuan');
    return $this->form_validation->run();
  }
  
  function tambah() {
    if (!validateFormData()) {
      $this->load->view('admin/bukutamu');
      return;
    }
  
    $data = array(
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'nohp' => $this->input->post('nohp'),
      'keperluan' => $this->input->post('keperluan'),
      'tujuan' => $this->input->post('tujuan'),
    );
  
    $nama = $this->input->post("nama");
    $this->Bukutamu_model->insertData('bukutamu', $data);
  
    $sql = "insert berkas(nama) values (?)";
    $this->db->query($sql, array($nama));
  
    $this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
    redirect('bukutamu');
  }
  
  function uploadweb($id) {
    if (!validateFormData()) {
      $this->load->view('admin/bukutamu');
      return;
    }
  
    $data = array(
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'nohp' => $this->input->post('nohp'),
      'keperluan' => $this->input->post('keperluan'),
      'tujuan' => $this->input->post('tujuan'),
    );
    
    $this->Bukutamu_model->updateDatab('bukutamu', $data, $id);
    $this->session->set_flashdata('notif', 'Edit Berhasil');
    redirect('bukutamu');
  }
  function hapus() {
    $nama = $this->uri->segment(3);
    $this->Bukutamu_model->deleteData('bukutamu', array('nama' => $nama));
  
    $this->session->set_flashdata('notif', 'Hapus Data Berhasil');
    redirect('bukutamu');
  }
  
  function indexdaftar() {
    $data = array(
      'title' => 'Data Legalisasi',
      'data_legalisasi' => $this->Bukutamu_model->getAllDataLegalisasi()
    );
    $this->load->view('web/bukutamu', $data);
  }
  
  function indexdaftar1() {
    $data = array(
      'title' => 'Data Legalisasi',
      'data_legalisasi' => $this->Bukutamu_model->getAllDataLegalisasi()
    );
    $this->load->view('admin/bukutamu', $data);
  }
  function registrasitamu() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nohp', 'No Handphone', 'required|numeric');
    $this->form_validation->set_rules('keperluan', 'Keperluan','required');
    $this->form_validation->set_rules('tujuan', 'Tujuan');
  
  /* generate nomor index*/
			$tahun_register = date("Y");
			$tanggal = date("y/m/d");
			//$tahun_register = 2023;
			$queryNomorIndex = $this->Bukutamu_model->get_seleksi_nomor_index($tahun_register);
			$nomor_index = (!empty($queryNomorIndex->row()->nomor_index) ? $queryNomorIndex->row()->nomor_index+1 : '1');
			$nomor_register = $nomor_index.'/'.$tahun_register;
			$id_layanan = 1;  
  /* end generate nomor index*/ 
    
  if ($this->form_validation->run() == FALSE) {
      $this->load->view('web/bukutamu');
    } else {
      $data = array(
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'nohp' => $this->input->post('nohp'),
        'keperluan' => $this->input->post('keperluan'),
        'tujuan' => $this->input->post('tujuan'),
      );
	  $data2 = array(
        'tanggal' => $tanggal,
        'nomor_index' => $nomor_index,
        'nomor_register' => $nomor_register,
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'telepon' => $this->input->post('nohp'),
        'keperluan' => $this->input->post('keperluan'),
        'keperluan' => $tanggal,
        'id_layanan' => $id_layanan,
      );
  
      $this->Bukutamu_model->insertData('bukutamu', $data);
      $this->Bukutamu_model->insertDataPtsp('bukutamu', $data2);
	  
      redirect('Home');
    }
  }
  

function admregistrasitamu() {
  $this->form_validation->set_rules('nama', 'Nama', 'required');
  $this->form_validation->set_rules('alamat', 'Alamat', 'required');
  $this->form_validation->set_rules('nohp', 'No Handphone', 'required|numeric');
  $this->form_validation->set_rules('keperluan', 'Keperluan','required');
  $this->form_validation->set_rules('tujuan', 'Tujuan');

  if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/bukutamu');
      return;
  }

  $data = array(
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'nohp' => $this->input->post('nohp'),
      'keperluan' => $this->input->post('keperluan'),
      'tujuan' => $this->input->post('tujuan'),
  );

  $this->Bukutamu_model->insertData('bukutamu', $data);
  $sql = "insert berkas(nama) values (?)";
  $this->db->query($sql, array($data['nama']));
  redirect("upload_legalisasi/index1");
}

function indexweb() {
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->view('web/bukutamu');
}
}
?>