<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('ProfileModel');
		$this->load->model('LogUserModel');
		$this->load->model('UnitModel', 'defaultModel');
	}

	public function unit()
	{
		$this->load->view('register/unit');
	}

	public function register_unit()
	{
		$data = [
			'nama'  => $this->input->post('nama'),
			'is_approve'  => 0,
			'telepon'  => $this->input->post('telepon'),
			'password'  => $this->input->post('password'),
			'email'  => $this->input->post('email'),
			'jenis'  => $this->input->post('jenis'),
			'kategori'  => $this->input->post('kategori')
		];

		if ($this->defaultModel->add($data)) {
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Registrasi berhasil, silahkan masuk menggunakan email dan nomor telepon sebagai password untuk melengkapi data anggota unit.']);
			redirect(base_url('login'));
		}
		exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan, silahkan menghubungi admin']));
	}
}
