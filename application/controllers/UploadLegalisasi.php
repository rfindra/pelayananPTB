<?php
class UploadLegalisasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        $this->load->model('berkas_model');
       // $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('upload');
    }

    function index(){
            $data=array(
            'title'=>'data berkas',
            'data_berkas' =>$this->berkas_model->getAlldataberkas(),
            
        );
        $this->load->view('web/uploadLegalisasi',$data);
    }
    function index1(){
            $data=array(
            'title'=>'data berkas',
            'data_berkas' =>$this->berkas_model->getAlldataberkas(),
            
        );
        $this->load->view('admin/uploadLegalisasi',$data);
    }

    function simpanedit($id){

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']   = '10000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';
        $config['remove_spaces']  = FALSE;
      
        $upload_error=array();
        $this->upload->initialize($config);
        for($i=0; $i<count($_FILES['gambar']['name']); $i++)
        {
            $_FILES['userfile']['name']= $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['gambar']['size'][$i];
            
            if (!$this->upload->do_upload())
            {
                // fail
               $gbrktp="";
               $gbrkta="";
               $gbrbas="";
               $gbrkuasa="";
               echo $this->upload->display_errors();
              
            }
            else {
              echo $fileName = $_FILES['gambar']['name'][$i];
               $images[$i] = $fileName;
            }
        }
       
        $gbrktp=$images[0];
        $gbrkta=$images[1];
        $gbrbas=$images[2];
        $gbrkuasa=$images[3];
          
        $data=array(
            //'id_berkas'=>$this->session->userdata('ID'),
            //'nik'=>$this->input->post('nik'),
            'ktp'=>$gbrktp,
            'kta'=>$gbrkta,
            'bas'=>$gbrbas,
            'kuasa'=>$gbrkuasa,
        );
        
        $this->berkas_model->updateDatab('berkas',$data,$id);
        redirect("Legalisasibas/indexweb");
    }

    function simpanedit1($id){

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']   = '10000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';
        $config['remove_spaces']  = FALSE;
      
        $upload_error=array();
        $this->upload->initialize($config);
        for($i=0; $i<count($_FILES['gambar']['name']); $i++)
        {
            $_FILES['userfile']['name']= $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['gambar']['size'][$i];
            
            if (!$this->upload->do_upload())
            {
                // fail
               $gbrktp="";
               $gbrkta="";
               $gbrbas="";
               $gbrkuasa="";
               echo $this->upload->display_errors();
              
            }
            else {
              echo $fileName = $_FILES['gambar']['name'][$i];
               $images[$i] = $fileName;
            }
        }
       
        $gbrktp=$images[0];
        $gbrkta=$images[1];
        $gbrbas=$images[2];
        $gbrkuasa=$images[3];
          
        $data=array(
            //'id_berkas'=>$this->session->userdata('ID'),
            //'nik'=>$this->input->post('nik'),
            'ktp'=>$gbrktp,
            'kta'=>$gbrkta,
            'bas'=>$gbrbas,
            'kuasa'=>$gbrkuasa,
        );
        
        $this->berkas_model->updateDatab('berkas',$data,$id);
        redirect("Legalisasibas");
    }
}
?>