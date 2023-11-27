<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation');
	  $this->load->model('WithdrawModel','m');
	}
	public function index()
	{
	    $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('bank_name','Bank Name', 'trim|required');
        $this->form_validation->set_rules('amount','Amount', 'trim|required');
        if( $this->input->post('account_amount') <  $this->input->post('amount'))
   {
       $this->session->set_flashdata('error','Insufficient Balance for Your Withdrow');
       redirect(base_url().'Withdraw');
   }else{
        if ($this->form_validation->run()== TRUE) {
	        $formArray['user_id']= $_SESSION['user_id'];
            $formArray['bank_id']= $this->input->post('bank_name');
            $formArray['amount'] = $this->input->post('amount');
            $formArray['type_transaction'] = 0;
            $this->m->create($formArray);
            $this->session->set_flashdata('success','Your Withdraw Request Sent Successfully');
            redirect(base_url().'Withdraw');
	    }else{
	          $this->data['page_title'] = 'Withdraw';
	        if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('withdrawView');
	    }
	    }
   }
	}
	
	public function addWithdraw()
	{
        if($this->input->post('type')==1)
		{
			$bank_name=$this->input->post('bank_name');
			$transaction_type=$this->input->post('transaction_type');
			$amount=$this->input->post('amount');
			$this->m->saveWithraw($bank_name,$transaction_type,$amount);	
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
	public function withdrawHistory()
	{
          $this->data['page_title'] = 'Withdraw History';
	        if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('withdrawHistoryView');
	    }
	    
	}
	


}