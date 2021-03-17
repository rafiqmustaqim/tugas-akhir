<?php 

class Beranda_model extends CI_Model{
	



	public function jumlah_mahasiswa(){
		$this->db->select('COUNT(nim) as total_mahasiswa');
		return $this->db->get('mahasiswa')->result();
	}

	public function jumlah_mahasiswa_mi(){
		$this->db->select('COUNT(nim) as total_mahasiswa_mi');
		$this->db->where('id_prodi = "MI"');
		return $this->db->get('mahasiswa')->result();
	}

	public function jumlah_mahasiswa_ka(){
		$this->db->select('COUNT(nim) as total_mahasiswa_ka');
		$this->db->where('id_prodi = "KA"');
		return $this->db->get('mahasiswa')->result();
	}

	public function jumlah_mahasiswa_ab(){
		$this->db->select('COUNT(nim) as total_mahasiswa_ab');
		$this->db->where('id_prodi = "AB"');
		return $this->db->get('mahasiswa')->result();
	}

	public function jumlah_mahasiswa_abi(){
		$this->db->select('COUNT(nim) as total_mahasiswa_abi');
		$this->db->where('id_prodi = "ABI"');
		return $this->db->get('mahasiswa')->result();
	}

	public function jumlah_mahasiswa_humas(){
		$this->db->select('COUNT(nim) as total_mahasiswa_humas');
		$this->db->where('id_prodi = "HUMAS"');
		return $this->db->get('mahasiswa')->result();
	}


	public function jumlah_mahasiswa_bekerja(){
		$this->db->select('COUNT(fk_nim) as total_mahasiswa_bekerja');
		$this->db->where('keterangan = "Diterima"');
		return $this->db->get('proses_penempatan')->result();
	}


	public function jumlah_mahasiswa_bekerja_mi(){
		$this->db->join('mahasiswa','proses_penempatan.fk_nim = mahasiswa.nim');
		$this->db->select('COUNT(fk_nim) as mahasiswa_bekerja_mi ');
		$this->db->where('keterangan = "Diterima"');
		$this->db->where('id_prodi = "MI"');
		return $this->db->get('proses_penempatan')->result();
	}

	public function jumlah_mahasiswa_bekerja_ka(){
		$this->db->join('mahasiswa','proses_penempatan.fk_nim = mahasiswa.nim');
		$this->db->select('COUNT(fk_nim) as mahasiswa_bekerja_ka ');
		$this->db->where('keterangan = "Diterima"');
		$this->db->where('id_prodi = "KA"');
		return $this->db->get('proses_penempatan')->result();
	}

	public function jumlah_mahasiswa_bekerja_ab(){
		$this->db->join('mahasiswa','proses_penempatan.fk_nim = mahasiswa.nim');
		$this->db->select('COUNT(fk_nim) as mahasiswa_bekerja_ab ');
		$this->db->where('keterangan = "Diterima"');
		$this->db->where('id_prodi = "AB"');
		return $this->db->get('proses_penempatan')->result();
	}

	public function jumlah_mahasiswa_bekerja_abi(){
		$this->db->join('mahasiswa','proses_penempatan.fk_nim = mahasiswa.nim');
		$this->db->select('COUNT(fk_nim) as mahasiswa_bekerja_abi ');
		$this->db->where('keterangan = "Diterima"');
		$this->db->where('id_prodi = "ABI"');
		return $this->db->get('proses_penempatan')->result();
	}

	public function jumlah_mahasiswa_bekerja_humas(){
		$this->db->join('mahasiswa','proses_penempatan.fk_nim = mahasiswa.nim');
		$this->db->select('COUNT(fk_nim) as mahasiswa_bekerja_humas ');
		$this->db->where('keterangan = "Diterima"');
		$this->db->where('id_prodi = "HUMAS"');
		return $this->db->get('proses_penempatan')->result();
	}

	public function jumlah_perusahaan(){
		$this->db->select('COUNT(id_perusahaan) as total_perusahaan');
		return $this->db->get('perusahaan')->result();
	}

	public function mengumpulkan_cv(){
		$this->db->select('COUNT(nim) as ada_cv');
		$this->db->where('cv IS NOT NULL', null,false);
		return $this->db->get('mahasiswa')->result();
	}

	public function tidak_mengumpulkan_cv(){
		$this->db->select('COUNT(nim) as gaada_cv');
		$this->db->where('cv', null);
		return $this->db->get('mahasiswa')->result();
	}



	public function jumlah_user_admin(){
		$this->db->select('COUNT(user_id) as user_admin');
		$this->db->where('level !="MHS"');
		return $this->db->get('user')->result();
	}


	public function jumlah_user_mahasiswa(){
		$this->db->select('COUNT(user_id) as user_mahasiswa');
		$this->db->where('level ="MHS"');
		$this->db->where('status ="1"');
		return $this->db->get('user')->result();
	}


	public function jumlah_user_belum_verifikasi(){
		$this->db->select('COUNT(user_id) as belum_verifikasi');
		$this->db->where('level ="MHS"');
		$this->db->where('status ="0"');
		return $this->db->get('user')->result();
	}













































}


?>