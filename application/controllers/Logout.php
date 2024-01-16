<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
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
		if ($this->session->userdata() !== null) {
			$this->session->sess_destroy();
		}
		// $this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil Logout']);
		// redirect(base_url('login'));
		$this->session->set_flashdata(['status' => 'error', 'message' => 'Username atau Password salah!']);

		redirect('login');
	}
}
