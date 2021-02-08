<?php 


Class Mahasiswa extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Mahasiswa_model');

	}



	public function index(){
		$data['title'] = "SIPKM | Data Mahasiswa ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa();
		if($level === 'ADM' || $level === 'KABIRO' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/mahasiswa/v_mahasiswa',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function detail($nim){
		$data['title'] = "SIPKM | Detail Mahasiswa ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa_by_nim($nim);
		if($level === 'ADM' || $level === 'KABIRO' || $level === 'STAF'){
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
		$data['title'] = "SIPKM | Tambah Data Mahasiswa ";
		if($this->session->userdata('level') === 'ADM' || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'  ){
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
		$data['title'] = "SIPKM | Edit Data Mahasiswa ";
		$data['data'] = $this->Mahasiswa_model->get_mahasiswa_by_nim($nim);
		if($this->session->userdata('level') === 'ADM' || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'  ){
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
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Mahasiswa_model->add_mahasiswa();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Mahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editMahasiswa($nim){
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Mahasiswa_model->edit_mahasiswa($nim);
			$this->session->set_flashdata('msg','diubah!');

			redirect('Mahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deleteMahasiswa($nim){
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Mahasiswa_model->delete_mahasiswa($nim);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('Mahasiswa');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}











}


?>