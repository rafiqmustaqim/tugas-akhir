<?php 


Class Admin extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Admin_model');

	}


	public function index(){
		
		$this->load->view('admin/v_login');

	}

	public function dashboard(){
		if($this->session->userdata('level') === 'ADM'){
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/dashboard');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}
	}

	public function getUser(){

		$data['user'] = $this->Admin_model->get_user();
		if($this->session->userdata('level') === 'ADM'){
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}
	}


	












}


?>