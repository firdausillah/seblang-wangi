<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('ProfileModel');
		$this->load->model('LogUserModel');
	}

	public function index()
	{
		// $data = [
		// 	'title' => $this->ProfileModel->findBy(['id' => 1])->row()
		// ];

		// print_r($this->session->flashdata());
		if (isset($_SESSION['nama'])) {
			redirect('admin/dashboard');
		}else{
			$this->load->view('login');
		}
	}

	public function auth()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = [
			'username' => $username,
			'password' => $password
		];

		$cek = $this->AuthModel->cekLogin('users', $where)->row();
		$test = $this->AuthModel->cekLogin('users', $where)->num_rows();

		if ($test > 0) {
			$data_session = [
				'id'	=> $cek->id,
				'nama'	=> $cek->nama,
				'username'	=> $cek->username,
				'password'	=> $cek->password,
				'role'	=> $cek->role,
				'status'	=> 'login'
			];
			// print_r($cek);
			// print_r($test);
			// exit();

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil login']);
			//https://youtu.be/ubLmRj8eojA jika flashdata tidak hilang otomatis

			redirect('admin/dashboard');
		} else {
			// $this->session->set_flashdata('error', 'Username atau Password salah!');
			$this->session->set_flashdata( ['status'=>'error', 'message'=>'Username atau Password salah!']);

			redirect('login');
		}
	}

	// public function logout()
	// {
		
	// 	if ($this->session->userdata() !== null) {
	// 		$this->session->sess_destroy();
	// 	}
	// 	$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil Logout']);
	// 	redirect(base_url('login'));
	// }
}
