<?php 

class Perusahaan_model extends CI_Model{




	public function get_perusahaan(){
		return $this->db->get('perusahaan')->result_array();
	}

	public function get_perusahaan_by_id($id_perusahaan){
		// $array = array('id_perusahaan' =>  $id_perusahaan);
		// return $this->db->get_where('perusahaan',$array)->row();
		$array=array('id_perusahaan'=>$id_perusahaan);
		$query = $this->db->get_where('perusahaan', $array);
		$ret = $query->result();
		return $ret;
	}




	public function add_perusahaan(){
		$data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat' => $this->input->post('alamat'),
			'permintaan_via' => $this->input->post('permintaan_via'),
			'contact_person' => $this->input->post('contact_person'),
			'jabatan' => $this->input->post('jabatan'),
			'telepon' => $this->input->post('telepon'),
			'email' => $this->input->post('email'),
			'posisi' => $this->input->post('posisi'),
			'kriteria' => $this->input->post('kriteria'),
			'status_kerja' => $this->input->post('status_kerja')
		);
		$this->db->insert('perusahaan',$data);
	}

	public function edit_perusahaan($id_perusahaan){
		$id_perusahaan = $this->input->post('id_perusahaan');
		$data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat' => $this->input->post('alamat'),
			'permintaan_via' => $this->input->post('permintaan_via'),
			'contact_person' => $this->input->post('contact_person'),
			'jabatan' => $this->input->post('jabatan'),
			'telepon' => $this->input->post('telepon'),
			'email' => $this->input->post('email'),
			'posisi' => $this->input->post('posisi'),
			'kriteria' => $this->input->post('kriteria'),
			'status_kerja' => $this->input->post('status_kerja')
		);
		$this->db->where('id_perusahaan',$id_perusahaan);
		$this->db->update('perusahaan',$data);

	}

	public function delete_perusahaan($id_perusahaan){
		$this->db->where('id_perusahaan',$id_perusahaan);
		$this->db->delete('perusahaan');
	}


















}


?>