<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
    if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }
	}
	public function index()
	{
	    $this->data['page_title'] = 'Notification';
	        if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('notificationView');
	    }
	    
	}
// 	public function notificationDetail()
// 	{
// 	    $this->data['page_title'] = 'Notification Detail';
// 	        if($this->session->userdata('user_id') != TRUE){
//     		$this->session->set_flashdata('msg','Please login your account');
//     		redirect(base_url().'Login/index');
// 	    }else{
//         	$this->load->view('compound/mainHeader',$this->data);
//         	$this->load->view('notificationDetailView');
// 	    }
	    
// 	}
}