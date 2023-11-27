<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	 $this->load->model('RechargeModel','m');
    if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }
	    $this->load->library('form_validation');
	}
	public function index()
	{       
	        $this->data['page_title'] = 'Recharge';
	        if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('rechargeView');
	    }
	    
	}
	public function rechargeHistory()
	{
	        $this->data['page_title'] = 'Recharge History';
	        if($this->session->userdata('login') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('rechargeHistoryView');
	    }
	    
	}
	public function rechargeDetail()
	{
	        $this->data['page_title'] = 'Recharge Detail';
	        if($this->session->userdata('login') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('rechargeDetailView');
	    }
	    
	}
	public function Invesment($id)
	{
	        $this->data['page_title'] = 'Invesment';
	        if($this->session->userdata('login') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('invesmentView',['pkg_id' => $id]);
	    }
	    
	}


  function get_Date(){
         $id=$this->input->get('id');
         $data=$this->m->getDateDOA($id);
         echo json_encode($data);
     }
     
     public function create(){
         $this->data['page_title'] = 'Recharge Pay';
			$config['upload_path']          = './assets/uploads/recharge';
			$config['new_path']          = './assets/uploads/user/recharge';
			$config['allowed_types']        = 'gif|jpg|png';  
			$config['encrypt']              = true;
			$this->load->library('upload', $config);
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
			$this->form_validation->set_rules('transection_ID','Transection ID', 'trim|required');
			$this->form_validation->set_rules('account_holder_name','Account Holder Name', 'trim|required');
			$this->form_validation->set_rules('account_number','Account Number','trim|required');
			if ($this->form_validation->run()== TRUE) {
				if(!empty($_FILES['image']['name'])){
					if ($this->upload->do_upload('image')) {
						$data = $this->upload->data();
						$formArray['reciept_image']= $data['file_name'];
						$formArray['amount']= $this->input->post('amount');
						$formArray['transaction_id']= $this->input->post('transection_ID');
						$formArray['account_holder']= $this->input->post('account_holder_name');
						$formArray['account_number']= $this->input->post('account_number');
						$formArray['user_id']= $_SESSION['user_id'];
						$this->m->create($formArray);
						$this->session->set_flashdata('success','Account Recharge successfully');
						redirect(base_url().'Recharge/create');
					}
					else{
						// We go some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'",'</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('compound/mainHeader',$this->data);
						$this->load->view('rechargePayView',$data);
					}
				}else{
					$this->session->set_flashdata('error','Please upload transection image');
					redirect(base_url().'Recharge/create');
				}
			}else{
		    if($this->session->userdata('login') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('rechargePayView');
	    }
			}
		}
}
?>
