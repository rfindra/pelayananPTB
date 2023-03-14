<?php

class UploadLegalisasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('berkas_model');
        $this->load->helper(['form', 'url']);
    }

    private function loadView($view, $data) {
        $data['title'] = 'Data Berkas';
        $data['data_berkas'] = $this->berkas_model->getAlldataberkas();
        $this->load->view($view, $data);
    }
  
    public function index() {
        $this->load->library('upload');
        $this->loadView('web/uploadlegalisasi', []);
    }
  
    public function index1() {
        $this->load->library('upload');
        $this->loadView('admin/uploadlegalisasi', []);
    }
  
    function uploadImages($id, $view = 'web') {
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
            $data['ktp'] = file_get_contents($_FILES['gambar']['tmp_name'][0]);
        }
    
        if (isset($images[1])) {
            $data['kta'] = file_get_contents($_FILES['gambar']['tmp_name'][1]);
        }
    
        if (isset($images[2])) {
            $data['bas'] = file_get_contents($_FILES['gambar']['tmp_name'][2]);
        }
    
        if (isset($images[3])) {
            $data['kuasa'] = file_get_contents($_FILES['gambar']['tmp_name'][3]);
        }
    
        $viewPath = $view === 'admin' ? 'admin/' : 'web/';
        $this->berkas_model->updateData('berkas', $data, $id);
        redirect("Legalisasibas/index{$viewPath}");
    }
    }
?>