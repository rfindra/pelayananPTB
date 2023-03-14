<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesekretariatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kesekretariatan_model');
        $this->load->library('form_validation');
    }

    public function indexweb() {

        $data['title'] = 'Kesekretariatan';
        // Code to display the kepaniteraan.php page
        $this->load->view('/web/kesekretariatan',$data);
    }
}
?>