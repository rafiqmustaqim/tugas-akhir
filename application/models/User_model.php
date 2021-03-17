<?php 

class User_model extends CI_Model{



	public function get_profil(){
		$nim = $this->session->userdata('username');
		$this->db->where('nim',$nim);
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get('mahasiswa')->result();
	}

	public function edit_mahasiswa($nim){

		$nim = $this->session->userdata('username');// sebagai parameter where
		$nim_update = $this->input->post('nim_update'); // data nim yang diinput

		//config upload foto
		$namafile =  $this->input->post('nim');
		$config_foto['upload_path']          = './assets/upload/mahasiswa';
		$config_foto['allowed_types']        = 'gif|jpg|png|jpeg';
		$config_foto['file_name']            = str_replace(' ', '_', $namafile);
		$config_foto['max_size']             = '10000';
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

		//config upload cv
		$namafile =  $this->input->post('nim');
		$config_cv['upload_path']          = './assets/upload/mahasiswa/cv';
		$config_cv['allowed_types']        = 'pdf';
		$config_cv['file_name']            = str_replace(' ', '_', $namafile);
		$config_cv['max_size']             = '10000';
		$config_cv['max_width']            = '';
		$config_cv['max_height']           = '';
		$config_cv['overwrite']           = TRUE;
        // $config_cv['encrypt_name']          = TRUE;
		$this->upload->initialize($config_cv);
		if ($this->upload->do_upload('cv'))
		{

			$file_name_cv = $_FILES["cv"]["name"];
			$file_ext_cv = pathinfo($file_name_cv, PATHINFO_EXTENSION);
			$file_cv = str_replace(' ', '_', $namafile).'.'.strtolower($file_ext_cv);

		}else{
			$file_cv = $this->input->post('old_cv');
		}
		
		$data = array(
			'nim' => $this->input->post('nim_update'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'minat' => $this->input->post('minat'),
			'ipk' => $this->input->post('ipk'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),
			'foto' => $file_foto,
			'cv' => $file_cv

		);
		$this->db->where('nim',$nim);
		$this->db->update('mahasiswa',$data);

	}
	

	public function get_profil_akun(){
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id',$id);
		return $this->db->get('user')->result();
	}

	public function edit_profil_akun($id){
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


	public function jadwal_interview(){
		$nim = $this->session->userdata('username');
		$this->db->join('mahasiswa','mahasiswa.nim = jadwal_interview.fk_nim');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = jadwal_interview.fk_perusahaan');
		$this->db->where('nim',$nim);
		return $this->db->get('jadwal_interview')->result();
	}

	public function get_penempatan(){
		$nim = $this->session->userdata('username');
		$this->db->join('mahasiswa', 'mahasiswa.nim = proses_penempatan.fk_nim');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = proses_penempatan.fk_perusahaan');
		$this->db->order_by('tgl_proses','DESC');
		$this->db->where('nim',$nim);
		return $this->db->get('proses_penempatan')->result();
	}



	public function upload_cv($nim){
		$nim = $this->input->post('nim');
		$namafilecv =  $this->input->post('nim');
		$config_cv['upload_path']          = './assets/upload/mahasiswa/cv';
		$config_cv['allowed_types']        = 'pdf';
		$config_cv['file_name']            = str_replace(' ', '_', $namafilecv);
		$config_cv['max_size']             = '5000';
		$config_cv['max_width']            = '';
		$config_cv['max_height']           = '';
		$config_cv['overwrite']           = TRUE;
        // $config_cv['encrypt_name']          = TRUE;
		$this->upload->initialize($config_cv);
		if ($this->upload->do_upload('cv'))
		{

			$file_name_cv = $_FILES["cv"]["name"];
			$file_ext_cv = pathinfo($file_name_cv, PATHINFO_EXTENSION);
			$file_cv = str_replace(' ', '_', $namafilecv).'.'.strtolower($file_ext_cv);

		}
		else
		{
			echo "<script>alert('Silahkan pilih file terlebih dahulu')</script>";
			echo $this->upload->display_errors();
		}
		$data = array ('cv' => $file_cv );
		$this->db->where('nim',$nim);
		$this->db->update('mahasiswa',$data);
	}


	public	function download($nim){		
		$query = $this->db->get_where('mahasiswa',array('nim'=>$nim));
		return $query->row_array();

	}

	public function get_masalah(){
		$nim = $this->session->userdata('username');
		$this->db->where('fk_nim',$nim);
		$this->db->join('mahasiswa','mahasiswa.nim = permasalahan.fk_nim');
		return $this->db->get('permasalahan')->result();
	}


}


?>