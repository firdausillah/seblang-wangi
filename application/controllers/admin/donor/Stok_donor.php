<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Stok_donor extends CI_Controller
{
    public $defaultVariable = 'stok_donor';
    public $url_index = 'admin/donor/stok_donor';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('StokDonorModel', 'defaultModel');

        if ($this->session->userdata('role') != 'superadmin' && $this->session->userdata('role') != 'udd') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }

    }

    public function index()
    {

        $page = (isset($_GET['page'])?$_GET['page']:'index');

        if($page == 'index'){
            $data = [
                'title' => 'Stok Donor',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index.'/table'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index.'/form'
            ];

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index.'/form'
            ];

            $this->load->view('layout_admin/base', $data);
        }

    }

    public function save()
    {
        $id = $this->input->post('id');
        $data = [
            'tanggal_update'    => $this->input->post('tanggal_update'),
            'a' => $this->input->post('a'),
            'b' => $this->input->post('b'),
            'ab'    => $this->input->post('ab'),
            'o' => $this->input->post('o'),
            'wb_a'  => $this->input->post('wb_a'),
            'wb_b'  => $this->input->post('wb_b'),
            'wb_ab' => $this->input->post('wb_ab'),
            'wb_o'  => $this->input->post('wb_o'),
            'prc_a' => $this->input->post('prc_a'),
            'prc_b' => $this->input->post('prc_b'),
            'prc_ab'    => $this->input->post('prc_ab'),
            'prc_o' => $this->input->post('prc_o'),
            'tc_a'  => $this->input->post('tc_a'),
            'tc_b'  => $this->input->post('tc_b'),
            'tc_ab' => $this->input->post('tc_ab'),
            'tc_o'  => $this->input->post('tc_o'),
            'fpp_a' => $this->input->post('fpp_a'),
            'fpp_b' => $this->input->post('fpp_b'),
            'fpp_ab'    => $this->input->post('fpp_ab'),
            'fpp_o' => $this->input->post('fpp_o'),
            'keterangan'    => $this->input->post('keterangan'),
            'is_active'    => 1
        ];

        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function exportExcel()
    {
        // print_r(); exit();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'F') as $key => $value) {
            $spreadsheet->getActiveSheet()->getColumnDimension($value)->setAutoSize(true);
        }

        $sheet->setCellValue("A1", "TANGGAL UPDATE");
        $sheet->setCellValue("B1", "A");
        $sheet->setCellValue("C1", "B");
        $sheet->setCellValue("D1", "AB");
        $sheet->setCellValue("E1", "O");
        $sheet->setCellValue("F1", "WB-A");
        $sheet->setCellValue("G1", "WB-B");
        $sheet->setCellValue("H1", "WB-AB");
        $sheet->setCellValue("I1", "WB-O");
        $sheet->setCellValue("J1", "PRC-A");
        $sheet->setCellValue("K1", "PRC-B");
        $sheet->setCellValue("L1", "PRC-AB");
        $sheet->setCellValue("M1", "PRC-O");
        $sheet->setCellValue("N1", "TC-A");
        $sheet->setCellValue("O1", "TC-B");
        $sheet->setCellValue("P1", "TC-AB");
        $sheet->setCellValue("Q1", "TC-O");
        $sheet->setCellValue("R1", "FPP-A");
        $sheet->setCellValue("S1", "FPP-B");
        $sheet->setCellValue("T1", "FPP-AB");
        $sheet->setCellValue("U1", "FPP-O");
        $sheet->setCellValue("V1", "KETERANGAN");


        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A". $x, $value["tanggal_update"]);
            $sheet->setCellValue("B". $x, $value["a"]);
            $sheet->setCellValue("C". $x, $value["b"]);
            $sheet->setCellValue("D". $x, $value["ab"]);
            $sheet->setCellValue("E". $x, $value["o"]);
            $sheet->setCellValue("F". $x, $value["wb_a"]);
            $sheet->setCellValue("G". $x, $value["wb_b"]);
            $sheet->setCellValue("H". $x, $value["wb_ab"]);
            $sheet->setCellValue("I". $x, $value["wb_o"]);
            $sheet->setCellValue("J". $x, $value["prc_a"]);
            $sheet->setCellValue("K". $x, $value["prc_b"]);
            $sheet->setCellValue("L". $x, $value["prc_ab"]);
            $sheet->setCellValue("M". $x, $value["prc_o"]);
            $sheet->setCellValue("N". $x, $value["tc_a"]);
            $sheet->setCellValue("O". $x, $value["tc_b"]);
            $sheet->setCellValue("P". $x, $value["tc_ab"]);
            $sheet->setCellValue("Q". $x, $value["tc_o"]);
            $sheet->setCellValue("R". $x, $value["fpp_a"]);
            $sheet->setCellValue("S". $x, $value["fpp_b"]);
            $sheet->setCellValue("T". $x, $value["fpp_ab"]);
            $sheet->setCellValue("U". $x, $value["fpp_o"]);
            $sheet->setCellValue("V". $x, $value["keterangan"]);

            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'stok-donor-seblang-wangi-' . date('dmy') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
    }
    
    public function delete($id)
    {
        if ($this->defaultModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
