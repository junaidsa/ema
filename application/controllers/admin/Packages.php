<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	if ($this->session->userdata('id') != TRUE) {
            $this->session->set_flashdata('msg', 'Please login your account');
            redirect(base_url() . 'admin/AdminLogin');
        }
    $this->load->library('form_validation');
	$this->load->model('admin/PackagesModel','m');
	}
	 public function index(){
	     $this->load->view('admin/header');
	     $this->load->view('admin/packageView');
	 }
	 public function addPackage(){
	     $this->load->view('admin/header');
	     $this->load->view('admin/addPackages');
	 }
	 
	 public function create(){
			$config['upload_path']          = './assets/uploads/packages';
			$config['new_path']          = './assets/uploads/user';
			$config['allowed_types']        = 'gif|jpg|png';  
			$config['encrypt']              = true;
			$this->load->library('upload', $config);
			
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
			$this->form_validation->set_rules('packages_name','packages_name', 'trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('min_amount','min_amount', 'trim|required');
			$this->form_validation->set_rules('max_amount','max_amount','trim|required');
			$this->form_validation->set_rules('valid_days','valid_days', 'trim|required');
			$this->form_validation->set_rules('profit','profit','trim|required');
			$this->form_validation->set_rules('description','description', 'trim|required');
			if ($this->form_validation->run()== TRUE) {
				if(!empty($_FILES['image']['name'])){
					if ($this->upload->do_upload('image')) {
						$data = $this->upload->data();
						$formArray['image']= $data['file_name'];
						$formArray['packages_name']= $this->input->post('packages_name');
						$formArray['min_amount']= $this->input->post('min_amount');
						$formArray['max_amount']= $this->input->post('max_amount');
						$formArray['valid_days']= $this->input->post('valid_days');
						$formArray['status']= $this->input->post('status');
						$formArray['profit']= $this->input->post('profit');
						$formArray['description']= $this->input->post('description');
						$this->m->create($formArray);
						$this->session->set_flashdata('success','Package added successfully');
						redirect(base_url().'admin/Packages');
					}
					else{
						// We go some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'",'</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('admin/addPackages',$data);
					}
				}else{
						$formArray['packages_name']= $this->input->post('packages_name');
						$formArray['min_amount']= $this->input->post('min_amount');
						$formArray['max_amount']= $this->input->post('max_amount');
						$formArray['valid_days']= $this->input->post('valid_days');
						$formArray['profit']= $this->input->post('profit');
						$formArray['description']= $this->input->post('description');
					$this->m->create($formArray);
					$this->session->set_flashdata('success','User added successfully');
					redirect(base_url().'admin/Packages');
				}
			}else{
				$this->load->view('admin/header');
				$this->load->view('admin/addPackages');
			}
		}
		function get_id(){
         $id=$this->input->get('id');
         $data=$this->m->getpackages($id);
         echo json_encode($data);
     }
     
    function updatePackages(){
		$id=$this->input->post('id');
		$packages_name=$this->input->post('packages_name');
		$min_amount=$this->input->post('min_amount');
		$max_amount=$this->input->post('max_amount');
		$valid_days=$this->input->post('valid_days');
		$profit=$this->input->post('profit');
		$description=$this->input->post('description');
		$status=$this->input->post('status');
		$data=$this->m->update_Packages($id,$packages_name,$min_amount,$max_amount,$valid_days,$profit,$description,$status);
		echo json_encode($data);
	}
	function deletePackages(){
		$id=$this->input->post('id');
		$data=$this->m->delete_Packages($id);
		echo json_encode($data);
	}
}