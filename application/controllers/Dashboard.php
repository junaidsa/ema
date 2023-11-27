<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
    if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }
	    $this->load->model('DashboardModel','m');
	}
	public function index()
	{
	        $this->data['page_title'] = 'Dashboard';
	        if($this->session->userdata('user_id') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/header',$this->data);
        	$this->load->view('dashboard');
	    }
	    
	}
	
	public function searchPackage()
	{
	        $this->data['page_title'] = 'Search';
	        if($this->session->userdata('login') != TRUE){
    		$this->session->set_flashdata('msg','Please login your account');
    		redirect(base_url().'Login/index');
	    }else{
        	$this->load->view('compound/mainHeader',$this->data);
        	$this->load->view('searchView');
	    }
	    
	}
	
	
	function get_id(){
         $id=$this->input->get('id');
         $data=$this->m->getpackages($id);
         echo json_encode($data);
     }
     
    function get_pkg(){
        $data=$this->m->getPkgData();
        echo json_encode($data);
    }
    
    public function buyPkg()
	{
        if($this->input->post('type')==1)
		{
			$expiry_date=$this->input->post('expiry_date');
			$invest_amount=$this->input->post('invest_amount');
			$profit_amount=$this->input->post('profit_amount');
			$pkg_name=$this->input->post('pkg_name');
			$this->m->buyPkgDAO($expiry_date,$invest_amount,$profit_amount,$pkg_name);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
	
	public function checkExpiry()
	{
        if($this->input->post('type')==1)
		{
			$user_id=$this->input->post('user_id');
			$pkg_id=$this->input->post('pkg_id');
			$this->m->checkExpiryDAO($user_id,$pkg_id);
			echo json_encode(array(
				"statusCode"=>200
			));
		}
	}
//     public function getPackage()
// 	{
// 	    $id = $this->input->post('id');
// 		    $data=$this->m->getPackageDAO($id);
//             echo json_encode($data);
//     }

}