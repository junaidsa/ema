<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
		     $this->load->model('admin/Notification_Model','m');
	if ($this->session->userdata('login') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }
    $this->load->library('form_validation');
	$this->load->model('Notification_Model','m');
	}
	 public function index(){
	     $this->load->view('admin/header');
	     $this->load->view('admin/notificationView');
	 }
	 
	   public function getdata(){
        $query = $this->db->query("SELECT * FROM `ema_notification`");
        echo json_encode($query->result());
    } 
    
	  public function addNotifacation(){

	 }
	 
	 public function create(){
			
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
			$this->form_validation->set_rules('title','Title', 'trim|required');
			$this->form_validation->set_rules('description','Description', 'trim|required');
			if ($this->form_validation->run()== TRUE) {
			    
			    $formArray['title'] = $this->input->post('title');
			     $formArray['description'] = $this->input->post('description');
			    $this->m->create($formArray);
			    $this->session->set_flashdata('success','Notification Update successfully');
			    redirect(base_url().'admin/Notification');
			    }else{
	     $this->load->view('admin/header');
	     $this->load->view('admin/addNotification');
			}
		}
}