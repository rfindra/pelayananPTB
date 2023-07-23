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
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|jpeg|png|pdf',
            'max_size' => '10000',
            'max_width' => '20000',
            'max_height' => '20000',
            'remove_spaces' => false,
        ];
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        $data = [];
    
        $gambarInputs = ['gambar_ktp', 'gambar_kta', 'gambar_bas', 'gambar_surat_kuasa'];
    
        foreach ($gambarInputs as $inputName) {
            if (isset($_FILES[$inputName])) {
                $files = $_FILES[$inputName];
                $count = count($files['name']);
    
                for ($i = 0; $i < $count; $i++) {
                    $_FILES['file']['name'] = $files['name'][$i];
                    $_FILES['file']['type'] = $files['type'][$i];
                    $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['file']['error'] = $files['error'][$i];
                    $_FILES['file']['size'] = $files['size'][$i];
    
                    $fileType = $_FILES['file']['type'];
                    $uploadPath = "./uploads/{$fileType}/";
    
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
    
                    $this->upload->initialize([
                        'upload_path' => $uploadPath,
                        'allowed_types' => $config['allowed_types'],
                        'max_size' => $config['max_size'],
                        'max_width' => $config['max_width'],
                        'max_height' => $config['max_height'],
                        'remove_spaces' => $config['remove_spaces'],
                    ]);
    
                    if (!$this->upload->do_upload('file')) {
                        $error = $this->upload->display_errors();
                        // Handle upload error here, e.g. redirect with error message
                        redirect("Legalisasibas/index{$viewPath}?error={$error}");
                        return;
                    } else {
                        $data[$i]['file'] = "{$fileType}/" . $this->upload->data('file_name');
                    }
                }
            }
        }
    
        $this->berkas_model->updateData('berkas', $data, $id);
    
        $viewPath = $view === 'admin' ? 'admin/' : 'web/';
        redirect("Legalisasibas/index{$viewPath}");
    }
        
}
