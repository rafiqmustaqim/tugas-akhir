<?php 

class Admin_model extends CI_Model{




public function get_user(){
	return $this->db->get('user')->result_array();
}





















}


 ?>