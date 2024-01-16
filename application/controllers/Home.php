<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = [
			'gelombangs' => $this->mGelombang->get()->result(),
			'jurusans' => $this->mJurusan->get()->result(),
			'persyaratans' => $this->mPersyaratan->get()->result(),
			'asalsekolahs' => $this->mAsalSekolah->get()->result(),
			'profile' => $this->mProfile->findBy(['id' => 1])->row()
		];
		// $this->session->set_flashdata('success', $data);
		$this->load->view('welcome_message', $data);
	}

	public function save(){
		// tahun
		$date = date('Y');

		// nomor urut
		$nourut = $this->mSiswa->cekUrut();
		$urut = sprintf("%04s", $nourut + 1);

		// gelombang
		$getGelombang =  $this->mGelombang->findBy($_POST['id_gel'])->row();
		$gelombang = $getGelombang->gelombang;
		
		// kode = PPDB.tahun.nomor urut.gelombang
		$kode = 'PPDB'.$date.$urut.$gelombang;
		
		$data = [
			'nama'	=> $this->input->post('nama'),
			'kode_pendaftaran'	=> $kode,
			'nohp'	=> $this->input->post('nohp'),
			'sekolah_asal'	=> $this->input->post('sekolah_asal'),
			'id_jurusan'	=> $this->input->post('jurusan'),
			'id_gelombang'	=> $this->input->post('id_gel'),
			'password'	=> $this->input->post('password'),
			// 'tgl_daftar'	=> ''
		];

		// print_r($data);
		// exit();
		
		if ($this->mSiswa->add($data)) {
		// if ($data) {
			$this->session->set_flashdata('success', $data);
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
		}

		redirect(base_url('home'));
	}
}
