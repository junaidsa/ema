<?php
class BankModel extends CI_Model 
{
    	public function create($formArray){
    $this->db->insert('ema_bank_account',$formArray);
}
}