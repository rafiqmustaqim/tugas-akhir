<?php 

class Admin_model extends CI_Model{
	function __construct(){
		parent:: __construct();
		// $this->load->library('upload');
	}



	public function get_user(){
		$this->db->where('level !="MHS"');
		return $this->db->get('user')->result_array();
	}

	public function get_user_by_id($id){
		$this->db->where('user_id',$id);
		return $this->db->get('user')->result();
	}

	public function get_user_mhs_aktif(){
		$this->db->where('level ="MHS"');
		$this->db->where('status ="1"');
		return $this->db->get('user')->result_array();
	}
	public function get_user_mhs_nonaktif(){
		$this->db->where('level ="MHS"');
		$this->db->where('status ="0"');
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
				//config upload foto
		$namafile =  $this->input->post('username');
		$config_foto['upload_path']          = './assets/upload/foto-profil';
		$config_foto['allowed_types']        = 'gif|jpg|png|jpeg';
		$config_foto['file_name']            = str_replace(' ', '_', $namafile);
		$config_foto['max_size']             = '5000';
		$config_foto['max_width']            = '';
		$config_foto['max_height']           = '';
		$config_foto['overwrite']           = TRUE;
        // $config_foto['encrypt_name']          = TRUE;
		$this->upload->initialize($config_foto);
		if ($this->upload->do_upload('foto'))
		{

			$file_name_foto = $_FILES["foto"]["name"];
			$file_ext_foto = pathinfo($file_name_foto, PATHINFO_EXTENSION);
			$file_foto = str_replace(' ', '_', $namafile).'.'.strtolower($file_ext_foto);

		}else{
			$file_foto = $this->input->post('old_image');
		}
		
		$data = array(
			'username' => $this->input->post('username'),
			// 'password' => sha1($this->input->post('password')),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status'),
			'foto' => $file_foto

		);
		$this->db->where('user_id',$id);
		$this->db->update('user',$data);

	}

	public function verifikasi_user($id){
		$id = $this->input->post('user_id');
		$data = array(
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

// setting akun

	public function get_profil_akun(){
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id',$id);
		return $this->db->get('user')->result();
	}

	public function edit_profil_akun($id){
		$id = $this->input->post('user_id');
		//config upload foto
		$namafile =  $this->input->post('username');
		$config['upload_path']          = './assets/upload/foto-profil';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = str_replace(' ', '_', $namafile);
		$config['max_size']             = '5000';
		$config['max_width']            = '';
		$config['max_height']           = '';
		$config['overwrite']           = TRUE;
        // $config['encrypt_name']          = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('foto'))
		{

			$file_name_foto = $_FILES["foto"]["name"];
			$file_ext_foto = pathinfo($file_name_foto, PATHINFO_EXTENSION);
			$file_foto = str_replace(' ', '_', $namafile).'.'.strtolower($file_ext_foto);

		}else{
			$file_foto = $this->input->post('old_image');
		}
		$data = array(
			'username' => $this->input->post('username'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'foto' => $file_foto
		);
		$this->db->where('user_id',$id);
		$this->db->update('user',$data);

	}

	public function ganti_password($id){
		$id = $this->input->post('user_id');
		$data = array (

			'password' => sha1($this->input->post('password')),
		);
		$this->db->where('user_id',$id);
		$this->db->update('user',$data);
	}



// interview

	public function get_jadwal(){
		$this->db->join('mahasiswa','mahasiswa.nim = jadwal_interview.fk_nim');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = jadwal_interview.fk_perusahaan');

		return $this->db->get('jadwal_interview')->result_array();
	}

	public function get_jadwal_by_id($id){
		$array = array('id_jadwal' => $id);
		$this->db->join('mahasiswa','mahasiswa.nim = jadwal_interview.fk_nim');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = jadwal_interview.fk_perusahaan');
		return $this->db->get_where('jadwal_interview',$array)->result();
	}

	public function add_jadwal(){
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'fk_nim' => $this->input->post('fk_nim'),
			'fk_perusahaan' => $this->input->post('fk_perusahaan'),
			'tgl_interview' => $this->input->post('tgl_interview'),
			'keterangan' => $this->input->post('keterangan')

		);
		$this->db->insert('jadwal_interview',$data);
	}

	public function edit_jadwal($id){
		$id = $this->input->post('id_jadwal');
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'fk_nim' => $this->input->post('fk_nim'),
			'fk_perusahaan' => $this->input->post('fk_perusahaan'),
			'tgl_interview' => $this->input->post('tgl_interview'),
			'keterangan' => $this->input->post('keterangan')

		);
		$this->db->where('id_jadwal',$id);
		$this->db->update('jadwal_interview',$data);

	}

	public function delete_jadwal($id){
		$this->db->where('id_jadwal',$id);
		$this->db->delete('jadwal_interview');
	}












}


?>