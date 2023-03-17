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
        $this->loadView('web/uploadLegalisasi', []);
    }
  
    public function index1() {
        $this->loadView('admin/uploadLegalisasi', []);
    }
  
    function uploadImages($id, $view = 'web') {
        $config = [
            'upload_path' => 'uploads/',
            'allowed_types' => 'gif|jpg|jpeg|png|pdf',
            'max_size' => '10000',
            'max_width' => '20000',
            'max_height' => '20000',
            'remove_spaces' => false,
        ];
    
        $this->upload->initialize($config);
        
        $data = [];
    
        if (isset($_FILES['gambar'])) {
            $files = $_FILES['gambar'];
            $count = count($files['name']);
            
            for ($i = 0; $i < $count; $i++) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
                
                if (!$this->upload->do_upload('file')) {
                    echo $this->upload->display_errors();
                    return;
                } else {
                    $data[$i]['file'] = 'uploads/' . $this->upload->data('file_name');
                }
            }
        }
    
        $this->berkas_model->updateData('berkas', $data, $id);
        
        $viewPath = $view === 'admin' ? 'admin/' : 'web/';
        redirect("Legalisasibas/index{$viewPath}");
    }
    
}
