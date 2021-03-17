<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Admin_model');
		$this->load->model('User_model');
		$this->load->model('Beranda_model');
		$level = $this->session->userdata("level");
		// $this->load->library('javascript/jquery');


		// $kabiro = $this->session->userdata("level") == "KABIRO";
		// $staf = $this->session->userdata("level") == "STAF";

	}


	public function index(){
		
		$this->load->view('login/v_login');

	}

	public function Register(){
		
		$this->load->view('login/v_register');

	}

	public function saveRegister(){
		$this->Admin_model->add_user();
		$this->session->set_flashdata('pesan','didaftarkan, silahkan menunggu verifikasi data anda oleh bagian CNP');
		redirect('admin');
	}

	public function Beranda(){
		$level = $this->session->userdata("level");	
		$data['title'] = 'SIPKM | Beranda';
		// jumlah mahasiswa
		$data['jumlah_mahasiswa'] = $this->Beranda_model->jumlah_mahasiswa();
		$data['jumlah_mahasiswa_mi'] = $this->Beranda_model->jumlah_mahasiswa_mi();
		$data['jumlah_mahasiswa_ka'] = $this->Beranda_model->jumlah_mahasiswa_ka();
		$data['jumlah_mahasiswa_ab'] = $this->Beranda_model->jumlah_mahasiswa_ab();
		$data['jumlah_mahasiswa_abi'] = $this->Beranda_model->jumlah_mahasiswa_abi();
		$data['jumlah_mahasiswa_humas'] = $this->Beranda_model->jumlah_mahasiswa_humas();
		// jumlah mahasiswa bekerja
		$data['mahasiswa_bekerja'] = $this->Beranda_model->jumlah_mahasiswa_bekerja();
		$data['mahasiswa_bekerja_mi'] = $this->Beranda_model->jumlah_mahasiswa_bekerja_mi();
		$data['mahasiswa_bekerja_ka'] = $this->Beranda_model->jumlah_mahasiswa_bekerja_ka();
		$data['mahasiswa_bekerja_ab'] = $this->Beranda_model->jumlah_mahasiswa_bekerja_ab();
		$data['mahasiswa_bekerja_abi'] = $this->Beranda_model->jumlah_mahasiswa_bekerja_abi();
		$data['mahasiswa_bekerja_humas'] = $this->Beranda_model->jumlah_mahasiswa_bekerja_humas();
		
		
		$data['jumlah_perusahaan'] = $this->Beranda_model->jumlah_perusahaan();
		$data['kumpul_cv'] = $this->Beranda_model->mengumpulkan_cv();
		$data['ga_kumpul_cv'] = $this->Beranda_model->tidak_mengumpulkan_cv();
		$data['user_admin'] = $this->Beranda_model->jumlah_user_admin();
		$data['user_mahasiswa'] = $this->Beranda_model->jumlah_user_mahasiswa();
		$data['belum_verifikasi'] = $this->Beranda_model->jumlah_user_belum_verifikasi();

		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/beranda/dashboard');
			$this->load->view('templates/footer');
		}else{
			
			echo "<script>alert('Data berhasil dihapus!');</script>";
			redirect('admin');
		}
	}

	public function getUser(){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | User Management ";
		$data['user'] = $this->Admin_model->get_user();
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formEditUser($id){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | User Management ";
		$data['data'] = $this->Admin_model->get_user_by_id($id);
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_edit_user',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function getProfilAkun(){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Profil Akun";
		$data['data'] = $this->Admin_model->get_profil_akun();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF' ){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user_profile',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function settingAkun(){

		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Pengaturan Akun";
		$data['data'] = $this->Admin_model->get_profil_akun();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF' ){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user_setting',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function gantiPasswordUser($id){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF' ){
			$this->Admin_model->ganti_password($id);
			$this->session->set_flashdata('msg','diubah!');
			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}


	}

	public function gantiPassword($id){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF' ){
			$this->Admin_model->ganti_password($id);
			$this->session->set_flashdata('msg','diubah!');
			redirect('admin/settingAkun/'.$this->session->userdata('user_id'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}


	}

	public function editProfilAkun($id){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF' ){
			$this->Admin_model->edit_profil_akun($id);
			$this->session->set_flashdata('msg','diubah!');
			redirect('admin/settingAkun/'.$this->session->userdata('user_id'));
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}

	}


	public function getUserMahasiswa(){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | User Management ";
		$data['nonaktif'] = $this->Admin_model->get_user_mhs_nonaktif();
		$data['aktif'] = $this->Admin_model->get_user_mhs_aktif();
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function addUser(){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->add_user();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editUser($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->edit_user($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function verifikasiUser($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->verifikasi_user($id);
			$this->session->set_flashdata('msg','diverifikasi!');
			redirect('admin/getUserMahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function verifikasi($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->verifikasi_user($id);
			$this->session->set_flashdata('msg','diverifikasi!');
			redirect('admin/Beranda');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}
	
	
	public function deleteUser($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->delete_user($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deleteUserMahasiswa($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->delete_user($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getUserMahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}




	public function getProdi(){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | Program Studi ";
		$data['prodi'] = $this->Admin_model->get_Prodi();
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Prodi/v_Prodi',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function addProdi(){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->add_Prodi();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editProdi($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->edit_Prodi($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}
	
	public function deleteProdi($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->delete_Prodi($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function getJadwal(){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | Jadwal Interview ";
		$data['jadwal'] = $this->Admin_model->get_jadwal();
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/jadwal-interview/v_jadwal_interview',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formTambahJadwal(){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | Tambah Jadwal Interview ";
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/jadwal-interview/tambah_jadwal',$data);
			$this->load->view('templates/footer');
		}else{
			"<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formEditJadwal($id){
		$level = $this->session->userdata("level");	
		$data['title'] = "SIPKM | Edit Jadwal Interview ";
		$data['jadwal'] = $this->Admin_model->get_jadwal_by_id($id);
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/jadwal-interview/edit_jadwal',$data);
			$this->load->view('templates/footer');
		}else{
			"<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function addJadwal(){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->add_jadwal();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('admin/getJadwal');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editJadwal($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->edit_jadwal($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('admin/getJadwal');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}
	
	public function deleteJadwal($id){
		$level = $this->session->userdata("level");	
		if($level == 'ADM' || $level == 'STAF' || $level == 'KABID'){
			$this->Admin_model->delete_jadwal($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getJadwal');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}






}


?>