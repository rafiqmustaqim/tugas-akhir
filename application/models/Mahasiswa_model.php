<?php 

class Mahasiswa_model extends CI_Model{




	public function get_mahasiswa(){
		return $this->db->get('mahasiswa')->result_array();
	}

	public function get_mahasiswa_by_nim($nim){
		// $array = array('nim' =>  $nim);
		// return $this->db->get_where('mahasiswa',$array)->row();
		$array=array('nim'=>$nim);
		$query = $this->db->get_where('mahasiswa', $array);
		$ret = $query->result();
		return $ret;
	}




	public function add_mahasiswa(){
		$data = array(
			'nim' => $this->input->post('nim'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'ipk' => $this->input->post('ipk'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),
		);
		$this->db->insert('mahasiswa',$data);
	}

	public function edit_mahasiswa($nim){
		$nim = $this->input->post('nim');
		$data = array(
			'nim' => $this->input->post('nim'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'ipk' => $this->input->post('ipk'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),

		);
		$this->db->where('nim',$nim);
		$this->db->update('mahasiswa',$data);

	}

	public function delete_mahasiswa($nim){
		$this->db->where('nim',$nim);
		$this->db->delete('mahasiswa');
	}


















}


?>