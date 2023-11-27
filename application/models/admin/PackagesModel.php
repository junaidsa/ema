<?php
class PackagesModel extends CI_Model 
{
	 Public function __construct() 
    {
	    parent::__construct();
        
    }
    
	
// 	Add Package

    public function create($formArray){
    $this->db->insert('ema_packages',$formArray);
    }
    
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
                    'status' => $data->status
					
					);
			}
		}
		return $vresult;
	}
	function update_Packages($id,$packages_name,$min_amount,$max_amount,$valid_days,$profit,$description,$status){
		$result=$this->db->query("UPDATE `ema_packages` SET `packages_name`='$packages_name',`min_amount`='$min_amount',`max_amount`='$max_amount',`valid_days`='$valid_days',`status`='$status',`profit`='$profit',`description`='$description'  WHERE id='$id'");
		return $result;
	}
	function delete_Packages($id){
		$result=$this->db->query("UPDATE `ema_packages` SET `is_deleted`= 1 WHERE id='$id'");
		return $result;
	}
}
?>