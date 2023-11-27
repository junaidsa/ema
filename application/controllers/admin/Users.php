<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	if ($this->session->userdata('login') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }
	$this->load->model('admin/LoginModel','m');
	}
	
	public function index(){
	    $this->load->view('admin/header');
	    $this->load->view('admin/userListView');
	}
	
	public function getUserList()
    {
         $data=$this->m->getUserListDAO();
         echo json_encode($data);
     }
     
     function delete_User_Data(){
		$id=$this->input->post('id');
		$data=$this->m->delete_User($id);
		echo json_encode($data);
	}
}
