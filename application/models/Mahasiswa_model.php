<?php 

class Mahasiswa_model extends CI_Model{




	public function get_mahasiswa(){
		$this->db->join('prodi','mahasiswa.id_prodi = prodi.id_prodi','left');
		return $this->db->get('mahasiswa')->result_array();
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
		$config['upload_path']          = './assets/upload/mahasiswa';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = str_replace(' ', '_', $namafile);
		$config['max_size']             = '10000';
		$config['max_width']            = '';
		$config['max_height']           = '';
		$config['overwrite']            = TRUE;
        // $config['encrypt_name']          = TRUE;
		$this->load->library('upload', $config);
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
		$data = array(
			'nim' => $this->input->post('nim'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'ipk' => $this->input->post('ipk'),
			'minat' => $this->input->post('minat'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),
			'foto' => $file_foto
		);
		$this->db->insert('mahasiswa',$data);
	}

	public function edit_mahasiswa($nim){
		$nim = $this->input->post('nim');
		$nim_update = $this->input->post('nim_update');
		$namafile =  $this->input->post('nim');
		$config['upload_path']          = './assets/upload/mahasiswa';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = str_replace(' ', '_', $namafile);
		$config['max_size']             = '10000';
		$config['max_width']            = '';
		$config['max_height']           = '';
		$config['overwrite']           = TRUE;
        // $config['encrypt_name']          = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto'))
		{

			$file_name_foto = $_FILES["foto"]["name"];
			$file_ext_foto = pathinfo($file_name_foto, PATHINFO_EXTENSION);
			$file_foto = str_replace(' ', '_', $namafile).'.'.strtolower($file_ext_foto);

		}
		else
		{

			$file_foto = $this->input->post('old_image');
		}
		$data = array(
			'nim' => $this->input->post('nim_update'),
			'id_prodi' => $this->input->post('id_prodi'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'minat' => $this->input->post('minat'),
			'ipk' => $this->input->post('ipk'),
			'toeic' => $this->input->post('toeic'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'telepon_orangtua' => $this->input->post('telepon_orangtua'),
			'foto' => $file_foto

		);
		$this->db->where('nim',$nim);
		$this->db->update('mahasiswa',$data);

	}

	public function delete_mahasiswa($nim){
		$this->db->where('nim',$nim);
		$this->db->delete('mahasiswa');
	}


	public function detail_penempatan($nim){
		$array = array('nim' => $nim );
		$this->db->join('mahasiswa','mahasiswa.nim = proses_penempatan.nim_mahasiswa');
		$this->db->join('perusahaan','perusahaan.id_perusahaan = proses_penempatan.fk_id_perusahaan');
		return $this->db->get_where('proses_penempatan', $array)->result();
	}















}


?>