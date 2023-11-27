<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library(array('form_validation'));
	$this->load->model('admin/LoginModel','m');
	}
	
	public function index(){
	    $this->load->view('admin/adminLogin');
	}

	
	public function authenticate(){
		$this->form_validation->set_error_delimiters('<p style="color:rgb(248, 48, 48);">','</p>');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');

		if ($this->form_validation->run() == True) {
			$username = $this->input->post('username');
			$user = $this->m->getUserByName($username);
			if(!empty($user)){
				$password = md5($this->input->post('password'));

				if($password == $user['password']) {
				
        				$sess_data = array(
                        'login' => TRUE,
                        'id' => $user['id'],
                        'name' => $user['full_name'],
                        'mobile' => $user['mobile'],
                        );
                    $this->session->set_userdata($sess_data);
					redirect(base_url().'admin/Home/index');
				// 	redirect(base_url().'admin/Home/underConstructionView');

				}else{
					$this->session->set_flashdata('msg','Your Password is incorrect');
				redirect(base_url().'admin/adminLogin/index');
				}
			}else{
				$this->session->set_flashdata('msg','Mobile no or Password is incorrect');
				redirect(base_url().'admin/adminLogin/index');
			}
		}else{
		$this->load->view('admin/adminLogin');
		}

	}
	
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/adminLogin');
    }
}
