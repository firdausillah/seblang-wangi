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
		$is_admin = $this->input->post('is_admin');
		print_r($is_admin);
		
		if($is_admin=='superadmin'){
			$where = [
				'username' => $username,
				'password' => $password,
				'is_active' => 1
			];
			$cek = $this->AuthModel->cekLogin('users', $where)->row();
			$test = $this->AuthModel->cekLogin('users', $where)->num_rows();

			$redirect = 'admin/dashboard';
		}elseif($is_admin=='unit'){
			$where = [
				'email' => $username,
				'telepon' => $password
			];
			$cek = $this->AuthModel->cekLogin('unit', $where)->row();
			$test = $this->AuthModel->cekLogin('unit', $where)->num_rows();
			
			if($test>0){
				$cek->username = $cek->email;
				$cek->password = $cek->telepon;
				$cek->role = 'unit';
	
				$redirect = 'unit/dashboard';
			}
		}elseif($is_admin=='relawan'){
			$where = [
				'email' => $username,
				'telepon' => $password
			];
			$cek = $this->AuthModel->cekLogin('unit', $where)->row();
			$test = $this->AuthModel->cekLogin('unit', $where)->num_rows();
			
			if($test>0){
				$cek->username = $cek->email;
				$cek->password = $cek->telepon;
				$cek->role = 'unit';
	
				$redirect = 'unit/dashboard';
			}
		}
		
		if ($test > 0) {
			$data_session = [
				'id'	=> $cek->id,
				'nama'	=> $cek->nama,
				'username'	=> $cek->username,
				'password'	=> $cek->password,
				'role'	=> $cek->role,
				'status'	=> 'login'
			];

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil login']);
			//https://youtu.be/ubLmRj8eojA jika flashdata tidak hilang otomatis

			redirect($redirect);
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
