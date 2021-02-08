<?php 


Class Perusahaan extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Perusahaan_model');

	}



	public function index(){
		$data['title'] = "SIPKM | Data Perusahaan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Perusahaan_model->get_perusahaan();
		if($level === 'ADM' || $level === 'KABIRO' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_Perusahaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function detail($id_perusahaan){
		$data['title'] = "SIPKM | Detail Perusahaan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Perusahaan_model->get_perusahaan_by_id();
		if($level === 'ADM' || $level === 'KABIRO' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_Perusahaan_detail',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formTambah(){
		$data['title'] = "SIPKM | Tambah Data Perusahaan ";
		if($this->session->userdata('level') === 'ADM' || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'  ){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/form_tambah_perusahaan');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function formEdit($id_perusahaan){
		$data['title'] = "SIPKM | Edit Data Perusahaan ";
		$data['data'] = $this->Perusahaan_model->get_perusahaan_by_id($id_perusahaan);
		if($this->session->userdata('level') === 'ADM' || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'  ){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/form_edit_perusahaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function addPerusahaan(){
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Perusahaan_model->add_perusahaan();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Perusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editPerusahaan($id_perusahaan){
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Perusahaan_model->edit_perusahaan($id_perusahaan);
			$this->session->set_flashdata('msg','diubah!');

			redirect('Perusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deletePerusahaan($id_perusahaan){
		if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === 'KABIRO' || $this->session->userdata('level') === 'STAF'){
			$this->Perusahaan_model->delete_perusahaan($id_perusahaan);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('Perusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}











}


?>