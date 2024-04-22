<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mobile_unit extends CI_Controller
{
    public $defaultVariable = 'mobile_unit';
    public $url_index = 'admin/donor/mobile_unit';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_unitModel', 'defaultModel');

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
                'title' => 'Mobile Unit',
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
            // print_r(isset($_GET['id'])); exit();
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
            'tanggal'   => $this->input->post('tanggal'),
            'nama_lembaga'  => $this->input->post('nama_lembaga'),
            'lokasi'    => $this->input->post('lokasi'),
            'jumlah_kantong'    => $this->input->post('jumlah_kantong'),
            'is_active' => 1,
            'keterangan'    => $this->input->post('keterangan'),
            'jumlah_a'  => $this->input->post('jumlah_a'),
            'jumlah_b'  => $this->input->post('jumlah_b'),
            'jumlah_ab' => $this->input->post('jumlah_ab'),
            'jumlah_o'  => $this->input->post('jumlah_o')
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

        $sheet->setCellValue("A1", "tanggal");
        $sheet->setCellValue("B1", "nama_lembaga");
        $sheet->setCellValue("C1", "lokasi");
        $sheet->setCellValue("D1", "jumlah_kantong");
        $sheet->setCellValue("E1", "keterangan");
        $sheet->setCellValue("F1", "jumlah_a");
        $sheet->setCellValue("G1", "jumlah_b");
        $sheet->setCellValue("H1", "jumlah_ab");
        $sheet->setCellValue("I1", "jumlah_o");



        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["tanggal"]);
            $sheet->setCellValue("B" . $x, $value["nama_lembaga"]);
            $sheet->setCellValue("C" . $x, $value["lokasi"]);
            $sheet->setCellValue("D" . $x, $value["jumlah_kantong"]);
            $sheet->setCellValue("E" . $x, $value["keterangan"]);
            $sheet->setCellValue("F" . $x, $value["jumlah_a"]);
            $sheet->setCellValue("G" . $x, $value["jumlah_b"]);
            $sheet->setCellValue("H" . $x, $value["jumlah_ab"]);
            $sheet->setCellValue("I" . $x, $value["jumlah_o"]);


            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = $this->defaultVariable.'-seblang-wangi-' . date('dmy') . '.xlsx';

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
