<?php
class WithdrawModel extends CI_Model {
    // insert Category model
public function create($formArray){
    $amount = $formArray['amount'];
    $user_id = $formArray['user_id'];
    $bank_id = $formArray['bank_id'];
    $type_transaction = $formArray['type_transaction'];
    $query =  $this->db->query("UPDATE `ema_user` SET `balance`= balance - '$amount' WHERE id = $user_id");
    if($query){
        $this->db->query("INSERT INTO `ema_transaction`(`user_id`, `bank_id`, `amount`, `type_transaction`) VALUES ('$user_id','$bank_id','$amount','$type_transaction')");
    }
    
}
}