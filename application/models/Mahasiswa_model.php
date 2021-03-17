<?php 

class Mahasiswa_model extends CI_Model{

	function __construct(){
		parent:: __construct();
		$this->load->library('upload');

	}


	public function get_mahasiswa(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get('mahasiswa')->result_array();
	}

	public function get_mahasiswa_prodi_mi(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get_where('mahasiswa','prodi = "MI')->result_array();
	}

	public function get_mahasiswa_prodi_ka(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get_where('mahasiswa','prodi = "KA')->result_array();
	}

	public function get_mahasiswa_prodi_humas(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get_where('mahasiswa','prodi = "HUMAS')->result_array();
	}
	
	public function get_mahasiswa_prodi_ab(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get_where('mahasiswa','prodi = "AB')->result_array();
	}

	public function get_mahasiswa_by_nim($nim){
		// $array = array('nim' =>  $nim);
		// return $this->db->get_where('mahasiswa',$array)->row();
		$array=array('nim'=>$nim);
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		$query = $this->db->get_where('mahasiswa', $array);
		$ret = $query->result();
		return $ret;
	}

	function cari($id){
		$query= $this->db->get_where('mahasiswa',array('nim'=>$id));
		return $query;
	}

	function search_mahasiswa($judul){
		$this->db->like('nim', $judul);
		$this->db->or_like('nama_mahasiswa', $judul);
		$this->db->order_by('nama_mahasiswa', 'ASC');
		$this->db->limit(10);
		return $this->db->get('mahasiswa')->result();
	}


	public function add_mahasiswa(){

		$namafile =  $this->input->post('nim');
		$config_foto['upload_path']          = './assets/upload/mahasiswa';
		$config_foto['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
		$config_foto['file_name']            = str_replace(' ', '_', $namafile);
		$config_foto['max_size']             = '10000';
		$config_foto['max_width']            = '';
		$config_foto['max_height']           = '';
		$config_foto['overwrite']            = TRUE;
        // $config_foto['encrypt_name']          = TRUE;
		$this->upload->initialize($config_foto);
		if ($this->upload->do_upload('foto'))
		{

			$file_name_foto = $_FILES["foto"]["name"];
			$file_ext_foto = pathinfo($file_name_foto, PATHINFO_EXTENSION);
			$file_foto = str_replace(' ', '_', $namafile).'.'.strtolower($file_ext_foto);

		}
		else
		{

			echo $this->upload->display_errors();

		}
		$namafilecv =  $this->input->post('nim');
		$config_cv['upload_path']          = './assets/upload/mahasiswa/cv';
		$config_cv['allowed_types']        = 'pdf';
		$config_cv['file_name']            = str_replace(' ', '_', $namafilecv);
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
			$file_cv = str_replace(' ', '_', $namafilecv).'.'.strtolower($file_ext_cv);

		}else
		{

			echo $this->upload->display_errors();

		}

		$data = array(
			'nim' => $this->input->post('nim'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'ipk' => $this->input->post('ipk'),
			'minat' => $this->input->post('minat'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),
			'foto' => $file_foto,
			'cv' => $file_cv
		);
		$this->db->insert('mahasiswa',$data);
	}

	public function edit_mahasiswa($nim){

		$nim = $this->input->post('nim');// sebagai parameter where
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

	public function delete_mahasiswa($nim){
		$this->db->where('nim',$nim);
		$this->db->delete('mahasiswa');
	}

	// Upload download CV

	public function upload_cv($nim){
		$nim = $this->input->post('nim');
		$namafilecv =  $this->input->post('nim');
		$config_cv['upload_path']          = './assets/upload/mahasiswa/cv';
		$config_cv['allowed_types']        = 'pdf';
		$config_cv['file_name']            = str_replace(' ', '_', $namafilecv);
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
			$file_cv = str_replace(' ', '_', $namafilecv).'.'.strtolower($file_ext_cv);

		}
		else
		{

			echo $this->upload->display_errors();
		}
		$data = array ('cv' => $file_cv );
		$this->db->where('nim',$nim);
		$this->db->update('mahasiswa',$data);
	}

	public function detail_penempatan($nim){
		$array = array('nim' => $nim );
		$this->db->join('mahasiswa','mahasiswa.nim = proses_penempatan.fk_nim');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = proses_penempatan.fk_perusahaan');
		return $this->db->get_where('proses_penempatan', $array)->result();
	}

// Jadwal interview

	public function get_jadwal_by_id($nim){
		$array = array('nim' => $nim);
		$this->db->join('mahasiswa','mahasiswa.nim = jadwal_interview.fk_nim');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = jadwal_interview.fk_perusahaan');
		return $this->db->get_where('jadwal_interview',$array)->result();
	}



	public	function download($nim){		
		$query = $this->db->get_where('mahasiswa',array('nim'=>$nim));
		return $query->row_array();

	}


// Mahasiswa Bermasalah

	public function get_masalah(){
		$this->db->join('mahasiswa','mahasiswa.nim = permasalahan.fk_nim');
		return $this->db->get('permasalahan')->result_array();
	}

	public function get_masalah_by_id($nim){
		$nim=array('fk_nim'=>$nim);
		$this->db->join('mahasiswa','mahasiswa.nim = permasalahan.fk_nim');
		return $this->db->get_where('permasalahan',$nim)->result();
	}

	public function add_masalah(){
		$data = array(
			'fk_nim' => $this->input->post('fk_nim'),
			'jenis_masalah' => $this->input->post('jenis_masalah'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->db->insert('permasalahan',$data);
	}

	public function edit_masalah($id){
		$id = $this->input->post('id_masalah');
		$data = array(
			'fk_nim' => $this->input->post('fk_nim'),
			'jenis_masalah' => $this->input->post('jenis_masalah'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->db->where('id_masalah',$id);
		$this->db->update('permasalahan',$data);
	}


	public function delete_masalah($id){
		
		$this->db->where('id_masalah',$id);
		$this->db->delete('permasalahan');
	}

}


?>