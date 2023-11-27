<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	   $this->load->library('form_validation');
   
    			$this->load->model('BankModel','m');
	}
	public function index()
	{
	        $this->data['page_title'] = 'Account';
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
            $this->form_validation->set_rules('bank_name','Bank Name', 'trim|required');
            $this->form_validation->set_rules('account_title','Account Title', 'trim|required');
            $this->form_validation->set_rules('account_number','Account Number', 'trim|required');
                if ($this->form_validation->run()== TRUE) {
                 $formArray['bank_name']= $this->input->post('bank_name');
                 $formArray['account_title']= $this->input->post('account_title');
                 $formArray['account_number']= $this->input->post('account_number');
                 $formArray['mobile_number']= $this->input->post('mobile_number');
                 $formArray['user_id']= $_SESSION['user_id'];
                 $this->m->create($formArray);
                 $this->session->set_flashdata('success','Account added successfully');
                 redirect(base_url().'Bank');
                }else{
                 if($this->session->userdata('user_id') != TRUE){
    		     $this->session->set_flashdata('msg','Please login your account');
    		     redirect(base_url().'Login/index');
	            }else{
        	     $this->load->view('compound/mainHeader',$this->data);
        	     $this->load->view('bankView');
	            }
              }
	}
// 	add Bank
// 	add Bank
}