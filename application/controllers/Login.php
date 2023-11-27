<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
		    
	$this->load->library('form_validation');
	$this->load->model('Login_Model','m');
	}

	
	public function index()
{
        $this->data['page_title'] = 'Login';
        if(isset($_SESSION ['user_id']) == TRUE){
    		redirect(base_url('Dashboard'));
	    }else{
           $this->load->view('app_login',$this->data);
	    }
}
	
	
	public function Register()
	{
	$this->data['page_title'] = 'Register';
	$this->form_validation->set_error_delimiters('<p style="color:rgb(248, 48, 48);">','</p>');
	$this->form_validation->set_rules('full_name', 'Name','trim|required|min_length[3]|max_length[30]');
	$this->form_validation->set_rules('phone', 'Phone','trim|required|regex_match[/^[0-9]{11}$/]');
	$this->form_validation->set_rules('password', 'Password','trim|required|min_length[8]|max_length[20]');
	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
	$this->form_validation->set_rules('refral_code', 'refral_code','trim|required');
    	if ($this->form_validation->run()==TRUE) {
    		# code...
    	$data = $this->m->create();
    	if($data == TRUE){
    	    $this->session->set_flashdata('msg','Register Your Account Successfully');
    	    redirect(base_url('Login'));
    	}else{
    	    $this->session->set_flashdata('msg','Your Phone Number is Already Register');
    	    $this->load->view('app_register',$this->data);
    	}
    	}else{
    	        if(isset($_SESSION ['user_id']) == TRUE){
    		redirect(base_url('Dashboard'));
	    }else{
    		$this->load->view('app_register',$this->data);
	    }
    	}
	}
		public function authenticate(){
		$this->form_validation->set_error_delimiters('<p style="color:rgb(248, 48, 48);">','</p>');
		$this->form_validation->set_rules('phone','phone','trim|required|regex_match[/^[0-9]{11}$/]');
		$this->form_validation->set_rules('password','password','trim|required');

		if ($this->form_validation->run() == True) {
			$mobile= $this->input->post('phone');
			$user = $this->m->getByuserMobile($mobile);
			if(!empty($user)){
				$password = $this->input->post('password');

				if(password_verify($password,$user['password']) == TRUE) {
				
        				$sess_data = array(
                        'login' => TRUE,
                        'mobile_number' => $user['mobile_number'],
                        'full_name' => $user['full_name'],
                        'user_id' => $user['id'],
                        'refral_no' => $user['refral_no'],
                        'reference_no' => $user['reference_no'],
                        'user_status' => $user['user_status'],
                        'created_on' => $user['created_on'],
                        );
                    $this->session->set_userdata($sess_data);
					redirect(base_url().'Dashboard');

				}else{
					$this->session->set_flashdata('msg','Your Password is incorrect');
				redirect(base_url('Login'));
				}
			}else{
				$this->session->set_flashdata('msg','Mobile no or Password is incorrect');
				redirect(base_url('Login'));
			}
		}else{
		// Error conditio
		    if(isset($_SESSION ['user_id']) == TRUE){
    		redirect(base_url('Dashboard'));
	    }else{
		$this->load->view('app_login');
	    }
		}
	}
	
	
	// Section distroy function
	
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('Login');
    }
    
    function check_reference_varification()  
    {  
        $refrence_code=$this->input->post('refrence_code');
          $data= $this->m->is_reference_available($refrence_code);
		 echo json_encode($data);
               
    }  
}
