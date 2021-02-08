<?php 


Class Admin extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Admin_model');
		$level = $this->session->userdata("level");
		// $kabiro = $this->session->userdata("level") == "KABIRO";
		// $staf = $this->session->userdata("level") == "STAF";

	}


	public function index(){
		
		$this->load->view('admin/v_login');

	}

	public function dashboard(){
		$level = $this->session->userdata("level");	
		$data['title'] = 'SIPKM | Dashboard';
		if($level == 'ADM' || $level){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/dashboard');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied! please login!') </script>";
			redirect('admin');
		}
	}

	public function getUser(){
		$data['title'] = "SIPKM | User Management ";
		$data['user'] = $this->Admin_model->get_user();
		if($this->session->userdata('level') == 'ADM'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/user/v_user',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script>return alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function addUser(){
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->add_user();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editUser($id){
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->edit_user($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}
	
	public function deleteUser($id){
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->delete_user($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getUser');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function getProdi(){
		$data['title'] = "SIPKM | Program Studi ";
		$data['prodi'] = $this->Admin_model->get_Prodi();
		if($this->session->userdata('level') == 'ADM'){
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
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->add_Prodi();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editProdi($id){
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->edit_Prodi($id);
			$this->session->set_flashdata('msg','diubah!');

			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}
	
	public function deleteProdi($id){
		if($this->session->userdata('level') == 'ADM'){
			$this->Admin_model->delete_Prodi($id);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('admin/getProdi');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}







}


?>