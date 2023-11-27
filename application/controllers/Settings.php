<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
    if($this->session->userdata('user_id') != TRUE){
	$this->session->set_flashdata('msg','Please login your account');
	redirect(base_url().'Login/index');
    }
	$this->load->library('form_validation');
	}

	
	public function index()
{
            $this->data['page_title'] = 'Me';
            if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('settings');
	    }
	    
}
	public function help()
{
            $this->data['page_title'] = 'Help';
            if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('helpView');
	    }
	    
}
	public function aboutus()
{
            $this->data['page_title'] = 'About Us';
            if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('aboutusView');
	    }
	    
}
}