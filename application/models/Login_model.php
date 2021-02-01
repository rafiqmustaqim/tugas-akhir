<?php

class Login_model extends CI_Model{


	function validasi($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('user', 1);
		return $result;

	}




}



?>