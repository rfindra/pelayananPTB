<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['table', 'form_validation', 'session']);
        $this->load->helper(['form', 'url', 'date']);
        $this->load->model('login_user', '', TRUE);
    }

    public function login()
    {
        // Set session cache limiter to private
        session_cache_limiter('private');

        // Add no-cache header to HTTP response
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');

        $this->load->model('login_user');
        $result = $this->login_user->data_login(
            $this->input->post('username'), 
            md5($this->input->post('password'))
        );
        
        if ($result) {
            $row = $result[0];
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
        } else {
            $data['error'] = 'Invalid Username/Password!';
            $this->load->view('/web/login', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    public function index()
    {

        // add cache control headers to prevent caching
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

        $this->load->helper('url');
        $this->load->view('/admin/index');
    }
}