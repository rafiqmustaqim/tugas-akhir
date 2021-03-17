<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Mahasiswa_model');
		$this->load->model('Penempatan_model');
		$this->load->model('User_model');
	}


	public function dashboard(){
		$level = $this->session->userdata("level");	
		$data['title'] = 'SIPKM | Beranda';
		$data['data'] = $this->User_model->get_profil();
		$data['jadwal'] = $this->User_model->jadwal_interview();
		$data['proses_penempatan'] = $this->User_model->get_penempatan();
		$data['masalah'] = $this->User_model->get_masalah();

		if($level == 'MHS'){
			$this->load->view('templates-user/header',$data);
			$this->load->view('templates-user/sidebar');
			$this->load->view('user/beranda/dashboard');
			$this->load->view('templates-user/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}	
	}

	public function biodata(){
		$level = $this->session->userdata("level");	
		$data['title'] = 'SIPKM | Biodata';
		$data['data'] = $this->User_model->get_profil();
		$data['jadwal'] = $this->User_model->jadwal_interview();
		$data['proses_penempatan'] = $this->User_model->get_penempatan();
		if($level == 'MHS'){
			$this->load->view('templates-user/header',$data);
			$this->load->view('templates-user/sidebar');
			$this->load->view('user/mahasiswa/biodata',$data);
			$this->load->view('templates-user/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}	

	}

	public function formEdit(){
		$level = $this->session->userdata("level");
		$data['title'] = "SIPKM | Edit Biodata ".$this->session->userdata('nama_lengkap');
		$data['data'] = $this->User_model->get_profil();
		if($level == 'MHS'){
			$this->load->view('templates-user/header',$data);
			$this->load->view('templates-user/sidebar');
			$this->load->view('user/mahasiswa/form_edit_mahasiswa',$data);
			$this->load->view('templates-user/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editMahasiswa($nim){
		$level = $this->session->userdata("level");
		if($level == 'MHS'){
			$this->Mahasiswa_model->edit_mahasiswa($nim);
			$this->session->set_flashdata('msg','diubah!');

			redirect('user/biodata/'.$this->session->userdata('username'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public	function download($nim){
		// $this->load->helper('download');	
		$level = $this->session->userdata("level");	
		$fileinfo = $this->User_model->download($nim);
		$file = 'assets/upload/mahasiswa/cv/'.$fileinfo['cv'];
		force_download($file,NULL);
		
	}


	public function uploadCv($nim){
		if($level == 'MHS'){
			$this->User_model->upload_cv($nim);
			$this->session->set_flashdata('msg','di upload!');
			redirect('user/biodata/'.$this->session->userdata('username'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function progresPenempatan(){
		$level = $this->session->userdata("level");	
		$data['title'] = 'SIPKM | Progres Penempatan';
		$data['proses_penempatan'] = $this->User_model->get_penempatan();
		$data['masalah'] = $this->User_model->get_masalah();

		if($level == 'MHS'){
			$this->load->view('templates-user/header',$data);
			$this->load->view('templates-user/sidebar');
			$this->load->view('user/mahasiswa/v_progres_penempatan',$data);
			$this->load->view('templates-user/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}	


	}


	public function settingAkun(){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Pengaturan Akun ";
		$data['data'] = $this->User_model->get_profil_akun();
		if($level === 'MHS' || $level === 'ADM'){
			$this->load->view('templates-user/header',$data);
			$this->load->view('templates-user/sidebar');
			$this->load->view('user/mahasiswa/user_setting',$data);
			$this->load->view('templates-user/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function gantiPassword($id){
		$level = $this->session->userdata('level');
		if($level === 'MHS'){
			$this->User_model->ganti_password($id);
			$this->session->set_flashdata('msg','diubah!');
			redirect('user/settingAkun/'.$this->session->userdata('username'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}


	}

	public function editProfilAkun($id){
		$level = $this->session->userdata("level");
		if($level == 'MHS'){
			$this->User_model->edit_profil_akun($id);
			$this->session->set_flashdata('msg','diubah!');
			redirect('user/settingAkun/'.$this->session->userdata('username'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}

	}


}


?>