<?php
class Login_Model extends CI_Model 
{
	function create()
	{
	      $full_name = $this->input->post('full_name');
    	$phone = $this->input->post('phone');
    	$password =  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
    	$reference_no = $this->input->post('refrence_code');
    	$refral_no =  $this->input->post('refral_code');
    // 	go login 
	   // $this->db->where('mobile_number', $phone);
        // $query = $this->db->get('ema_user');
        $query = $this->db->query("SELECT * FROM `ema_user` WHERE mobile_number = '$phone'");
        $count_row = $query->num_rows();
              if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {
         
         
    	if($reference_no){
    	     
	         $res = $this->db->query("SELECT refral_no,r1,r2,r3 FROM `ema_user` WHERE refral_no = $reference_no");
	    if($res->num_rows()>0){
			foreach ($res->result() as $data) {
			$reference = $data->refral_no;
			$r1 = $data->r1;
			$r2 = $data->r2;
			$r3 = $data->r3;
					$this->db->query("INSERT INTO `ema_user`(`mobile_number`, `full_name`, `password`, `refral_no`, `reference_no`, `r3`, `r2`, `r1`, `balance`) VALUES ('$phone','$full_name','$password','$refral_no','$reference_no','$r2','$r1','$reference','0')");
}

	        
	    }
	    }else{
	  $res1 = $this->db->query("SELECT refral_no AS company FROM `ema_user` WHERE id = 1");
	    if($res1->num_rows()>0){
			foreach ($res1->result() as $data) {
			$company_code = $data->company;
}
		$this->db->query("INSERT INTO `ema_user`(`mobile_number`, `full_name`, `password`,`refral_no`,`user_status`, `r3`, `r2`, `r1`, `balance`) VALUES ('$phone','$full_name','$password','$refral_no','0','$company_code','$company_code','$company_code','0')");
    	}
     }
     return TRUE;

	}
	}
	
	
// 	Login 
public function getByuserMobile($mobile){
    $this->db->where('mobile_number',$mobile);
    $user = $this->db->get('ema_user')->row_array();
    // Select * From registeration  where mobile = [];
    return $user;
}
    function is_reference_available($refrence_code)  
      {  
           $qry = $this->db->query("SELECT * FROM `ema_user` WHERE refral_no = $refrence_code");
		   return $qry->result();
      }
}
?>