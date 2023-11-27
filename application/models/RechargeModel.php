<?php
class RechargeModel extends CI_Model 
{
    	function getDateDOA($id){
		$res=$this->db->query("SELECT * FROM `ema_bank` WHERE id = $id and is_deleted = 0");
		if($res->num_rows()>0){
			foreach ($res->result() as $data) {
				$vresult=array(
					'id' => $data->id,
					'bank_name' => $data->bank_name,
					'account_holder' => $data->account_holder,
					'account_number' => $data->account_number
					);
			}
		}
		return $vresult;
	}
	
	public function create($formArray){
    $this->db->insert('recharge_request',$formArray);
}
}
?>