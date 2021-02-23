<?php 

class Admin_model extends CI_Model{




	public function get_user(){
		return $this->db->get('user')->result_array();
	}


	public function add_user(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status')

		);
		$this->db->insert('user',$data);
	}

	public function edit_user($id){
		$id = $this->input->post('user_id');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status')

		);
		$this->db->where('user_id',$id);
		$this->db->update('user',$data);

	}

	public function delete_user($id){
		$this->db->where('user_id',$id);
		$this->db->delete('user');
	}





	public function get_prodi(){
		return $this->db->get('prodi')->result_array();
	}


	public function add_prodi(){
		$data = array(
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi')
			
		);
		$this->db->insert('prodi',$data);
	}

	public function edit_prodi($id){
		$id = $this->input->post('old_id');
		$data = array(
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi')
		);
		$this->db->where('id_prodi',$id);
		$this->db->update('prodi',$data);

	}

	public function delete_prodi($id){
		$this->db->where('id_prodi',$id);
		$this->db->delete('prodi');
	}
















}


?>