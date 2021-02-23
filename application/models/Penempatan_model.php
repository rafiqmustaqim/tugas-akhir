<?php 

class Penempatan_model extends CI_Model{




	public function get_proses_penempatan(){
		$this->db->join('mahasiswa', 'mahasiswa.nim = proses_penempatan.nim_mahasiswa');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = proses_penempatan.fk_id_perusahaan');
		return $this->db->get('proses_penempatan')->result_array();
	}

	public function get_proses_penempatan_by_id($id){
		// $array = array('id' =>  $id);
		// return $this->db->get_where('penempatan',$array)->row();
		$array=array('id_proses'=>$id);
		$this->db->join('mahasiswa', 'mahasiswa.nim = proses_penempatan.nim_mahasiswa');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = proses_penempatan.fk_id_perusahaan');
		$query = $this->db->get_where('proses_penempatan', $array);
		$ret = $query->result();
		return $ret;
	}




	public function add_proses_penempatan(){
		$data = array(
			'nim_mahasiswa' => $this->input->post('nim'),
			'fk_id_perusahaan' => $this->input->post('id_perusahaan'),
			'tgl_proses' => $this->input->post('tgl_proses'),
			'posisi_dilamar' => $this->input->post('posisi_dilamar'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan')
			// 'permasalahan' => $this->input->post('permasalahan'),
			
		);
		$this->db->insert('proses_penempatan',$data);
	}

	public function edit_proses_penempatan($id){
		$id = $this->input->post('id_proses');
		$data = array(
			'nim_mahasiswa' => $this->input->post('nim'),
			'fk_id_perusahaan' => $this->input->post('id_perusahaan'),
			'tgl_proses' => $this->input->post('tgl_proses'),
			'posisi_dilamar' => $this->input->post('posisi_dilamar'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
			'permasalahan' => $this->input->post('permasalahan')
			
		);
		$this->db->where('id_proses',$id);
		$this->db->update('proses_penempatan',$data);

	}

	public function delete_proses_penempatan($id){
		$this->db->where('id_proses',$id);
		$this->db->delete('proses_penempatan');
	}

// autocomplete mahasiswa dan perusahaan di form proses penempatan

	function search_mahasiswa($nama){
		$this->db->like('nim', $nama);
		$this->db->or_like('nama_mahasiswa', $nama);
		$this->db->order_by('nama_mahasiswa', 'ASC');
		$this->db->limit(10);
		return $this->db->get('mahasiswa')->result();
	}

	function search_perusahaan($id){
		$this->db->like('id_perusahaan', $id);
		$this->db->or_like('nama_perusahaan', $id);
		$this->db->order_by('nama_perusahaan', 'ASC');
		$this->db->limit(10);
		return $this->db->get('perusahaan')->result();
	}


// ambil data proses penempatan berdasarkan yang keterima
	public function get_progres_penempatan(){
		$this->db->join('mahasiswa', 'mahasiswa.nim = proses_penempatan.nim_mahasiswa');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = proses_penempatan.fk_id_perusahaan');
		$this->db->where('keterangan = "Diterima"');
		return $this->db->get('proses_penempatan')->result_array();
	}

// eksport data
		public function export_progres(){
		$this->db->join('mahasiswa', 'mahasiswa.nim = proses_penempatan.nim_mahasiswa');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = proses_penempatan.fk_id_perusahaan');
		$this->db->where('keterangan = "Diterima"');
		return $this->db->get('proses_penempatan')->result();
	}










}


?>