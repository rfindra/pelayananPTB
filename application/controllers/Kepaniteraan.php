<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepaniteraan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kepaniteraan_model');
        $this->load->library('form_validation');
    }

    public function indexweb() {

        $data['title'] = 'Kepaniteraan';
        // Code to display the kepaniteraan.php page
        $this->load->view('/web/kepaniteraan',$data);
    }
}
?>