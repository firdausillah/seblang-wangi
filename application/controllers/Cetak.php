<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cetak extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('ProfileModel');
		$this->load->model('SarprasModel');
		$this->load->model('RuangModel');
	}

	public function laporan_ruang($id){

		// print_r($this->SarprasModel->get()->result()); exit();
		// print_r($this->RuangModel->get()->result()); exit();
		// print_r($this->RuangModel->findBy(['tb_ruang.id' => $id])->row()); exit();

		$data = [
			'profile' => $this->ProfileModel->findBy(['id' => 1])->row(),
			'barang_ruang' => $this->SarprasModel->findBy(['tb_sarpras.id_ruang' => $id])->result(),
			'ruang' => $this->RuangModel->findBy(['tb_ruang.id' => $id])->row()
		];
		$this->load->view('cetak/laporan_ruang', $data);
	}

}
