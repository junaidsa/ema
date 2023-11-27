<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpiryController extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	    $this->load->model('DashboardModel','m');
	}
	
	public function index()
	{
	    $currentDate = date('Y-m-d H:i:s');
        $res = $this->db->query("SELECT * FROM `ema_purchase` where expiry_date < '$currentDate' and is_expired = 0");
	    if($res->num_rows()>0){
			foreach ($res->result() as $data) {
			    
				    $user_id = $data->user_id;
				    $purchase_id = $data->id;
				    $invest_amount = $data->invest_amount;
				    $profit = $data->profit_amount;
				$ProfitAmount = $profit -$invest_amount;
				
				$update_status = $this->db->query("UPDATE `ema_purchase` SET `is_expired`= 1 where id = $purchase_id and user_id = $user_id");
				        
		        $query1 = $this->db->query("UPDATE `ema_user` SET `balance`= balance + $profit where id = $user_id ");
		        if($query1){
		            $query = $this->db->query("INSERT INTO `ema_transaction`(`user_id`, `amount`,`profit`) VALUES ('$user_id','$profit','$ProfitAmount')");
		        if($query){
		            $query1 = $this->db->query("UPDATE `ema_purchase` SET `is_expired`= 1 where user_id = $user_id and id = $purchase_id");
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

}