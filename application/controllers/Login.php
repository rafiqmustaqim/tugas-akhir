<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
	}

	public function auth(){
		$username = $this->input->post('username', TRUE);
		$password = sha1($this->input->post('password'));
		$validasi = $this->login_model->validasi($username,$password);
		if($validasi->num_rows() > 0){
			$data = $validasi->row_array();
			$user_id = $data['user_id'];
			$username = $data['username'];
			$nama_lengkap = $data['nama_lengkap'];
			$level = $data['level'];
			$sessdata = array(
				'user_id' => $user_id,
				'username' => $username,
				'nama_lengkap' => $nama_lengkap,
				'level' => $level,
				'Logged_in' => TRUE
			);
			$this->session->set_userdata($sessdata);
			if($level === 'ADM' OR $level === 'KABIRO' OR $level === 'STAF'){
				redirect('admin/dashboard');
			}
			
		}
		else { echo $this->session->set_flashdata('msg', 'username atau password salah!');
		redirect('admin');

	}


}

function logout(){
	$this->session->sess_destroy();
	redirect('admin');
}












}

?>