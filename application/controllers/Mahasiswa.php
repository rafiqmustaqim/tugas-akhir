<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mahasiswa extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Mahasiswa_model');
		$this->load->model('Penempatan_model');
		$this->load->model('Admin_model');
		$this->load->model('User_model');

	}



	public function getMahasiswa(){
		$data['title'] = "SIPKM | Data Mahasiswa ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/v_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function minatMahasiswa(){
		$data['title'] = "SIPKM | Data Mahasiswa ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/v_minat_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function detail($nim){
		$this->session->set_userdata('nim',$nim);
		$data['title'] = "SIPKM | Detail Mahasiswa ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa_by_nim($nim);
		$data['proses_penempatan'] = $this->Mahasiswa_model->detail_penempatan($nim);
		$data['jadwal'] = $this->Mahasiswa_model->get_jadwal_by_id($nim);
		$data['masalah'] = $this->Mahasiswa_model->get_masalah_by_id($nim);
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/v_detail_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formTambah(){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Tambah Data Mahasiswa ";
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/form_tambah_mahasiswa');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function formEdit($nim){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Edit Data Mahasiswa ";
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa_by_nim($nim);
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/form_edit_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function addMahasiswa(){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->add_mahasiswa();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Mahasiswa/getMahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editMahasiswa($nim){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->edit_mahasiswa($nim);
			$this->session->set_flashdata('msg','diubah!');

			redirect('Mahasiswa/getMahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deleteMahasiswa($nim){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->delete_mahasiswa($nim);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('Mahasiswa/getMahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public	function download($nim){
		// $this->load->helper('download');		
		$fileinfo = $this->Mahasiswa_model->download($nim);
		$file = 'assets/upload/mahasiswa/cv/'.$fileinfo['cv'];
		force_download($file,NULL);
		
	}


	public function uploadCv($nim){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->upload_cv($nim);
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Mahasiswa/detail/'.$this->session->userdata('nim'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function getMasalah(){
		$data['title'] = "SIPKM | Mahasiswa Bermasalah ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_masalah();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/permasalahan/v_masalah',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formMasalah(){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Tambah Mahasiswa Bermasalah ";
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/permasalahan/form_masalah');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formEditMasalah($id){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Edit Mahasiswa Bermasalah ";
		$data['data'] = $this->Mahasiswa_model->get_masalah_by_id($id);
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/permasalahan/edit_masalah',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function addMasalah(){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->add_masalah();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Mahasiswa/getMasalah');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function editMasalah($id){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->edit_masalah($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('Mahasiswa/getMasalah');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deleteMasalah($id){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Mahasiswa_model->delete_masalah($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('Mahasiswa/getMasalah');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


}


?>