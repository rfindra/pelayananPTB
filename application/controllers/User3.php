<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(['table', 'form_validation', 'session']);
        $this->load->helper(['form', 'url', 'date']);
        $this->load->model('login_user', '', TRUE);
    }

    public function login() {
        $this->load->model('login_user');

        $result = $this->login_user->data_login($this->input->post('username'), MD5($this->input->post('password')));

        if ($result) {
            foreach ($result as $row) {
                $data = [
                    'ID' => $row->id_user,
                    'NAMA' => $row->nama_user,
                    'USERNAME' => $row->username,
                    'PSWD' => $row->password,
                    'EMAIL' => $row->email,
                    'FOTO' => $row->foto_user,
                ];
                $this->session->set_userdata($data);
                redirect('user');
            }
        } else {
            $data['error'] = 'Invalid Username/Password!';
            $this->load->view('/web/login', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function index() {
        if (!$this->session->userdata('ID')) {
            redirect('login');
        }
        $this->load->helper('url');
        $this->load->view('/admin/index');
    }
    
    public function destroy_session() {
        $this->session->sess_destroy();
    }
}
