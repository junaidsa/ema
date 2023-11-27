<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
		     $this->load->model('admin/Bank_Model','m');
	if ($this->session->userdata('login') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/adminLogin');
        }
    $this->load->library('form_validation');
	$this->load->model('AdminLogin_Model','m');
	}
	 public function index(){
	     $this->load->view('admin/header');
	     $this->load->view('admin/bankView');
	 }
	 public function addBank(){

	 }
	 
	 public function create(){
			$config['upload_path']          = './assets/uploads/packages';
			$config['new_path']          = './assets/uploads/user';
			$config['allowed_types']        = 'gif|jpg|png';  
			$config['encrypt']              = true;
			$this->load->library('upload', $config);
			
			
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
			$this->form_validation->set_rules('bank_name','Bank Name', 'trim|required');
			$this->form_validation->set_rules('account_holder','Acount Holder', 'trim|required');
			$this->form_validation->set_rules('account_number','Acount Number','trim|required');
			if ($this->form_validation->run()== TRUE) {
			    
			    $formArray['bank_name'] = $this->input->post('bank_name');
			     $formArray['account_holder'] = $this->input->post('account_holder');
			     $formArray['account_number'] = $this->input->post('account_number');
			    $this->m->create($formArray);
			    $this->session->set_flashdata('success','Bank Update successfully');
			    redirect(base_url().'admin/Bank');
			    
			    
				if(!empty($_FILES['image']['name'])){
					if ($this->upload->do_upload('image')) {
						$data = $this->upload->data();
						$formArray['image']= $data['file_name'];
						$formArray['bank_name']= $this->input->post('bank_name');
						$formArray['account_holder']= $this->input->post('account_holder');
						$formArray['account_number']= $this->input->post('account_number');
						$this->m->create($formArray);
						$this->session->set_flashdata('success','Bank Update successfully');
						redirect(base_url().'admin/Bank');
					}
					else{
						// We go some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'",'</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('admin/addBank',$data);
					}
				}else{
						$formArray['bank_name']= $this->input->post('bank_name');
						$formArray['account_holder']= $this->input->post('account_holder');
						$formArray['account_number']= $this->input->post('account_number');
					$this->m->create($formArray);
					$this->session->set_flashdata('success','User added successfully');
					redirect(base_url().'admin/Bank');
				}
			}else{
	     $this->load->view('admin/header');
	     $this->load->view('admin/addBank');
			}
		}
		function get_id(){
         $id=$this->input->get('id');
         $data=$this->m->getpackages($id);
         echo json_encode($data);
     }
     
    function updatePackages(){
		$id=$this->input->post('id');
		$bank_name=$this->input->post('bank_name');
		$account_holder=$this->input->post('account_holder');
		$account_number=$this->input->post('account_number');
		$valid_days=$this->input->post('valid_days');
		$profit=$this->input->post('profit');
		$description=$this->input->post('description');
		$status=$this->input->post('status');
		$data=$this->m->update_Packages($id,$bank_name,$account_holder,$account_number,$valid_days,$profit,$description,$status);
		echo json_encode($data);
	}
}