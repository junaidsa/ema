<?php
class DashboardModel extends CI_Model 
{
    function getpackages($id){
		$res=$this->db->query("SELECT * FROM `ema_packages` WHERE id = '$id'");
		if($res->num_rows()>0){
			foreach ($res->result() as $data) {
				$vresult=array(
					'id' => $data->id,
					'packages_name' => $data->packages_name,
                    'min_amount' => $data->min_amount,
                    'max_amount' => $data->max_amount,
                    'valid_days' => $data->valid_days,
                    'profit' => $data->profit,
                    'description' => $data->description,
                    'status' => $data->status,
                    'image' => $data->image
					);
			}
		}
		return $vresult;
	}
    function getPkgData(){
        $id=$this->input->get('id');
		$res=$this->db->query("SELECT * FROM `ema_packages` WHERE id = '$id'");
		if($res->num_rows()>0){
			foreach ($res->result() as $data) {
				$vresult=array(
				    'sale' => $data->min_amount
					
					);
			}
		}
		return $vresult;
	}
	
	function buyPkgDAO($expiry_date,$invest_amount,$profit_amount,$pkg_name)
	{
	    $userId = $_SESSION['user_id'];
	    $currentDateTime = date('Y-m-d H:i:s');
	    $amount = $invest_amount * -1;
	    $emaPurchase = $this->db->query("INSERT INTO `ema_purchase`( `user_id`, `pkg_name`, `invest_amount`, `profit_amount`, `entry_date`, `expiry_date`) VALUES ('$userId','$pkg_name','$invest_amount','$profit_amount','$currentDateTime','$expiry_date')");
	    if($emaPurchase){
	        	$query="UPDATE `ema_user` SET `balance`= balance - $invest_amount WHERE id = $userId";
		$result=$this->db->query($query);
		if($result){
		    $transaction="INSERT INTO `ema_transaction`(`user_id`,  `amount`, `type_transaction`,`is_approved`) VALUES ('$userId','$amount',2,1)";
		    $this->db->query($transaction);
		}
	    }
	
	}
	
	function checkExpiryDAO($user_id,$pkg_id)
	{
	    $res = $this->db->query("SELECT * FROM `ema_purchase` where user_id= $user_id and id = $pkg_id");
	    if($res->num_rows()>0){
			foreach ($res->result() as $data) {
			    
				    $invest_amount = $data->invest_amount;
				    $profit = $data->profit_amount;
				$ProfitAmount = $profit -$invest_amount;
				        
		        $query1 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $profit where id = $user_id ");
		        if($query1){
		            $query = $this->db->query("INSERT INTO `ema_transaction`(`user_id`, `amount`,`profit`) VALUES ('$user_id','$profit','$ProfitAmount')");
		        if($query){
		            $query1 = $this->db->query("UPDATE `ema_purchase` SET `is_expired`= 1 where user_id = $user_id and id = $pkg_id");
		        }
		        }
		        
				}
		}
	    $res1 = $this->db->query("SELECT SUM(amount) as total_amount FROM `ema_transaction` WHERE user_id = $user_id");
	    if($res1->num_rows()>0){
			foreach ($res1->result() as $data) {
				    $total_amount = $data->total_amount;
				        
		        $query2 = $this->db->query("UPDATE `ema_user` SET `balance`='$total_amount' WHERE id = $user_id");
		        
				}
		}
		
	}
	
// 	function getPkgData(){
// 	            $id=$this->input->get('id');
// 		$res=$this->db->query("");
// 		if($res->num_rows()>0){
// 			foreach ($res->result() as $data) {
// 				$vresult=array(
// 					'sale' => $data->min_amount
// 					);
// 			}
// 		}
// 		return $vresult;
// 	}
	
// 	function getPackageDAO($id){
		
// 		$query3= $this->db->query("SELECT * FROM `ema_packages` WHERE is_deleted = 0 AND id = '$id'");
// 		return $query3->result();
// 	}

}
?>