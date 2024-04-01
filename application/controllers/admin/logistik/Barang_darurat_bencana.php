<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Barang_darurat_bencana extends CI_Controller
{
    public $defaultVariable = 'barang_darurat_bencana';
    public $url_index = 'admin/logistik/barang_darurat_bencana';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_darurat_bencanaModel', 'defaultModel');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }

    }

    public function index()
    {

        $page = (isset($_GET['page'])?$_GET['page']:'index');

        if($page == 'index'){
            $data = [
                'title' => 'Barang Darurat Bencana',
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
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'merk'  => $this->input->post('merk'),
            'stok_akhir'  => $this->input->post('stok_akhir'),
            'sirkulasi'  => $this->input->post('sirkulasi'),
            'tanggal'  => $this->input->post('tanggal'),
            'satuan'  => $this->input->post('satuan'),
            'donor'  => $this->input->post('donor'),
            'dari'  => $this->input->post('dari'),
            'tanggal_expired'  => $this->input->post('tanggal_expired'),
            'expired'  => $this->input->post('expired'),
            'stok_awal'  => $this->input->post('stok_awal'),
            'jumlah'  => $this->input->post('jumlah'),
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

        $sheet->setCellValue("A1", "nama");
        $sheet->setCellValue("B1", "kode");
        $sheet->setCellValue("C1", "keterangan");
        $sheet->setCellValue("D1", "created_on");
        $sheet->setCellValue("E1", "merk");
        $sheet->setCellValue("F1", "stok_akhir");
        $sheet->setCellValue("G1", "sirkulasi");
        $sheet->setCellValue("H1", "tanggal");
        $sheet->setCellValue("I1", "satuan");
        $sheet->setCellValue("J1", "donor");
        $sheet->setCellValue("K1", "dari");
        $sheet->setCellValue("L1", "tanggal_expired");
        $sheet->setCellValue("M1", "expired");
        $sheet->setCellValue("N1", "stok_awal");
        $sheet->setCellValue("O1", "jumlah");

        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["nama"]);
            $sheet->setCellValue("B" . $x, $value["kode"]);
            $sheet->setCellValue("C" . $x, $value["keterangan"]);
            $sheet->setCellValue("D" . $x, $value["created_on"]);
            $sheet->setCellValue("E" . $x, $value["merk"]);
            $sheet->setCellValue("F" . $x, $value["stok_akhir"]);
            $sheet->setCellValue("G" . $x, $value["sirkulasi"]);
            $sheet->setCellValue("H" . $x, $value["tanggal"]);
            $sheet->setCellValue("I" . $x, $value["satuan"]);
            $sheet->setCellValue("J" . $x, $value["donor"]);
            $sheet->setCellValue("K" . $x, $value["dari"]);
            $sheet->setCellValue("L" . $x, $value["tanggal_expired"]);
            $sheet->setCellValue("M" . $x, $value["expired"]);
            $sheet->setCellValue("N" . $x, $value["stok_awal"]);
            $sheet->setCellValue("O" . $x, $value["jumlah"]);
            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pelaporan-barang-darurat-bencana-seblang-wangi-' . date('dmy') . '.xlsx';

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
