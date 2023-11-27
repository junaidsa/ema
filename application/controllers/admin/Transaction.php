<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->model('admin/TransactionModel','m');
	}
	
	public function recharge(){
	    	if ($this->session->userdata('id') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }else{
	    $this->load->view('admin/header');
	    $this->load->view('admin/rechargeView');
        }
	}
	
	public function withdraw(){
	    	if ($this->session->userdata('id') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }else{
	    $this->load->view('admin/header');
	    $this->load->view('admin/withdrawView');
        }
	}
	

		###################### Approve Transaction###############################	
		function approvedAmount(){
		$id=$this->input->post('id');
		$is_id=$this->input->post('is_id');
		$data=$this->m->approvedAmountDOA($id,$is_id);
		echo json_encode($data);
	}

		###################### Approve Transaction###############################	
		function approvedwithdrow(){
		$id=$this->input->post('id');
		$is_id=$this->input->post('is_id');
		$data=$this->m->approvedWithdorwDOA($id,$is_id);
		echo json_encode($data);
	}
}