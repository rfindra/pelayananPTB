<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view('home/home2');
	}
}
