<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	if ($this->session->userdata('login') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }
// 	$this->load->model('AdminLogin_Model','m');
 $this->load->library('form_validation');
	}
	
	public function index(){
	    $this->load->view('admin/header');
	    $this->load->view('admin/Home');
	}
	public function underConstructionView(){
	    $this->load->view('admin/underConstructionView');
	}
}
