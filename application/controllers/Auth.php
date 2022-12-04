<?php
class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function aksi_masuk(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$checking = $this->MainModel->check_login('user', array('username' => $username), array('password' => $password));
		if($checking != FALSE){
			foreach ($checking as $data){
			$data_session = array(
				'nama_user' => $data->nama_user,
				'peran' => $data->peran,
				'id_user' => $data->id_user,
				'id' => $data->username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			redirect('dashboard');
 			}
 
		}else{
			$this->session->set_flashdata('notifgagal','Username atau password salah !');
			redirect(base_url('auth'));
		}
	}
	public function daftar(){
		$this->session->sess_destroy();
		$this->load->view('register');
	}
	public function aksi_daftar(){
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array(
				'nama_user' => $nama_user,
				'username' => $username,
				'email' => $email,
				'password' => md5($password),
				'peran' => 'user'
		);
		$this->session->set_flashdata('notifsukses','Akun anda telah berhasil didaftarkan!');
		$this->MainModel->input_data($data,'user');
		$this->load->view('register');
	}
	public function keluar(){		
		redirect(base_url('auth'));
		$this->session->set_flashdata('notifsukses','Berhasil Keluar');
	}
}
