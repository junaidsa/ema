<?php
class Notification_Model extends CI_Model {

    public function create($formArray) {
	    $id = 1;
	     $this->db->where('id',$id);
    $this->db->update('ema_notification',$formArray);
	}
}
?>