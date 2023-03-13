<?php

class UploadLegalisasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('berkas_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('upload');
    }

    private function loadView($view, $data) {
      $data['title'] = 'Data Berkas';
      $data['data_berkas'] = $this->berkas_model->getAlldataberkas();
      $this->load->view($view, $data);
  }
  
  public function index() {
      $this->loadView('web/uploadlegalisasi', []);
  }
  
  public function index1() {
      $this->loadView('admin/uploadlegalisasi', []);
  }
  
    function uploadWeb($id) {
        $images = array();
        // Check if "gambar" index exists in $_FILES array
        if (isset($_FILES['gambar'])) {
            $config = array(
                'upload_path' => './uploads/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => '10000',
                'max_width' => '20000',
                'max_height' => '20000',
                'remove_spaces' => FALSE
            );
    
            $upload_error = array();
            $this->load->library('upload', $config);
            foreach ($_FILES['gambar']['name'] as $key => $value) {
                $_FILES['userfile']['name'] = $_FILES['gambar']['name'][$key];
                $_FILES['userfile']['type'] = $_FILES['gambar']['type'][$key];
                $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$key];
                $_FILES['userfile']['error'] = $_FILES['gambar']['error'][$key];
                $_FILES['userfile']['size'] = $_FILES['gambar']['size'][$key];
    
                if (!$this->upload->do_upload()) {
                    $images[] = "";
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    $fileName = $_FILES['gambar']['name'][$key];
                    $images[] = $fileName;
                }
            }
    
            $data = array(
                'ktp' => isset($images[0]) ? $images[0] : "",
                'kta' => isset($images[1]) ? $images[1] : "",
                'bas' => isset($images[2]) ? $images[2] : "",
                'kuasa' => isset($images[3]) ? $images[3] : ""
            );
    
            $this->berkas_model->updateDatab('berkas', $data, $id);
            redirect(base_url("Legalisasibas/indexweb"));
        }
    }
    
    function uploadAdmin($id) {
        if (!isset($_FILES['gambar'])) {
          return;
        }
      
        $config = [
          'upload_path' => './uploads/',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'max_size' => '10000',
          'max_width' => '20000',
          'max_height' => '20000',
          'remove_spaces' => false,
        ];
      
        $this->load->library('upload', $config);
      
        $images = [];
        foreach ($_FILES['gambar']['name'] as $index => $fileName) {
          $_FILES['userfile']['name'] = $_FILES['gambar']['name'][$index];
          $_FILES['userfile']['type'] = $_FILES['gambar']['type'][$index];
          $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$index];
          $_FILES['userfile']['error'] = $_FILES['gambar']['error'][$index];
          $_FILES['userfile']['size'] = $_FILES['gambar']['size'][$index];
      
          if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
          } else {
            $images[] = $fileName;
          }
        }
      
        $data = [
          'ktp' => '',
          'kta' => '',
          'bas' => '',
          'kuasa' => '',
        ];
      
        if (isset($images[0])) {
          $data['ktp'] = $images[0];
        }
      
        if (isset($images[1])) {
          $data['kta'] = $images[1];
        }
      
        if (isset($images[2])) {
          $data['bas'] = $images[2];
        }
      
        if (isset($images[3])) {
          $data['kuasa'] = $images[3];
        }
      
        $this->berkas_model->updateData('berkas', $data, $id);
        redirect('Legalisasibas');
      }
      }
?>