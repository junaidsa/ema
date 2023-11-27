<?php
class TransactionModel extends CI_Model 
{
	 Public function __construct() 
    {
	    parent::__construct();
        
    }
function approvedAmountDOA($id,$is_id){
    $date =  Date('Y-m-d');
    $userId = 0; 
    $recharge_amount = 0; 
    $query = $this->db->query("SELECT user_id,transaction_id,amount FROM `recharge_request` where id = $id");
    $array =  $query->result();
		foreach ($array as $arr) {
		$userId = $arr->user_id;
		$recharge_amount = $arr->amount;
		}
            // r1 r2 r3 commation
            $R1Profit =  $recharge_amount * 0.025;
            $R2Profit =  $recharge_amount * 0.015;
            $R3Profit =  $recharge_amount * 0.01;
		if($is_id >= 1){
		 $query2 = $this->db->query("UPDATE `recharge_request` SET `is_approve`='$is_id',`updated_on`='$date',`is_updated`='1' WHERE id = $id");
		 if($is_id == 1){
		      $query3 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $recharge_amount WHERE id = $userId");
		      
		      if($query3){
		          $query4 = $this->db->query("INSERT INTO `ema_transaction`( `user_id`,`amount`, `type_transaction`, `is_approved`) VALUES ('$userId','$recharge_amount','1','1')");
		      }
		      
		      if($query4){
		          $res = $this->db->query("SELECT r1,r2,r3 FROM `ema_user` WHERE id = $userId");
	    if($res->num_rows()>0){
			foreach ($res->result() as $data) {
				    $r3 = $data->r3;
				    $r2 = $data->r2;
				    $r1 = $data->r1;
				        
		        $queryR1 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $R1Profit WHERE refral_no = $r1");
		        if($queryR1){
		            $q1 = $this->db->query("SELECT id AS r1id FROM `ema_user` WHERE refral_no = $r1");
		            if($q1->num_rows()>0){
		                foreach ($q1->result() as $q1data) {
		                    $r1_id = $q1data->r1id;
		                       //  Transaction r1
		            $transactionR1 =  $this->db->query("INSERT INTO `ema_transaction`(`user_id`,  `amount`, `type_transaction`, `is_approved`) VALUES ('$r1_id','$R1Profit','3','2')");
		                }
		           
		                
		                
		                }
		     }
		   $queryR2 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $R2Profit WHERE refral_no = $r2");
		        if($queryR2){
		            $q2 = $this->db->query("SELECT id AS r2id FROM `ema_user` WHERE refral_no = $r2");
		            if($q2->num_rows()>0){
		                foreach ($q2->result() as $q2data) {
		                    $r2_id = $q2data->r2id;
		                $transactionR2 =  $this->db->query("INSERT INTO `ema_transaction`(`user_id`,  `amount`, `type_transaction`, `is_approved`) VALUES ('$r2_id','$R2Profit','3','3')");
		                }
		                
		                }
		     }
		     $queryR3 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $R3Profit WHERE refral_no = $r3");
		   
		        if($queryR3){
		            $q3 = $this->db->query("SELECT id AS r3id FROM `ema_user` WHERE refral_no = $r3");
		            if($q3->num_rows()>0){
		                foreach ($q3->result() as $q3data) {
		                    $r3_id = $q3data->r3id;
		                }
		                $transactionR3 =  $this->db->query("INSERT INTO `ema_transaction`(`user_id`,  `amount`, `type_transaction`, `is_approved`) VALUES ('$r3_id','$R3Profit','3','4')");
		                
		                }
		            
		            
		   }
		   //
		   
		   
			}
	        }
	      }
		      
		}
		}

	}
	
// ####################################### #


function approvedWithdorwDOA($id,$is_id){
    $date =  Date('Y-m-d');
		$result=$this->db->query("UPDATE `ema_transaction` SET `is_approved`='$is_id',`update_on`='$date',`is_updated`='1' WHERE id = $id");
	}
}