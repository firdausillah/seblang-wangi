<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sosial extends CI_Controller
{
    public $defaultVariable = 'pelayanan_kesehatan_sosial';
    public $url_index = 'admin/yankes/sosial';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('YankesModel', 'defaultModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }

    }

    public function index()
    {

        $page = (isset($_GET['page'])?$_GET['page']:'index');

        $kategori_pelayanan = ['Kaki Palsu', 'Tangan Palsu'];

        if($page == 'index'){
            $data = [
                'title' => 'Pelayanan Sosial',
                $this->defaultVariable => $this->defaultModel->findBy(['jenis_pelayanan' => 'Sosial', 'is_active' => 1])->result(),
                'content' => 'admin/yankes/table',
                'jenis_pelayanan' => 'sosial'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            $data = [
                'title' => 'Tambah Data',
                'content' => 'admin/yankes/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3',
                'kategori_pelayanan' => $kategori_pelayanan,
                'jenis_pelayanan' => 'sosial'
            ];

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => 'admin/yankes/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3',
                'kategori_pelayanan' => $kategori_pelayanan,
                'jenis_pelayanan' => 'sosial'
            ];

            $this->load->view('layout_admin/base', $data);
        }

    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('kategori_pelayanan'). $this->input->post('tanggal_selesai'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/yankes/sosial/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $data = [
            'is_active' => 1,
            'is_approve' => 0,
            'jenis_pelayanan' => 'Sosial',
            'foto'  => $foto,
            'kategori_pelayanan'  => $this->input->post('kategori_pelayanan'),
            'tanggal_mulai'  => $this->input->post('tanggal_mulai'),
            'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
            'jumlah_kk'  => $this->input->post('jumlah_kk'),
            'jumlah_jiwa'  => $this->input->post('jumlah_jiwa'),
            'jumlah_laki_laki'  => $this->input->post('jumlah_laki_laki'),
            'jumlah_perempuan'  => $this->input->post('jumlah_perempuan'),
            'jumlah_bayi'  => $this->input->post('jumlah_bayi'),
            'jumlah_balita'  => $this->input->post('jumlah_balita'),
            'jumlah_anak'  => $this->input->post('jumlah_anak'),
            'jumlah_remaja'  => $this->input->post('jumlah_remaja'),
            'jumlah_dewasa'  => $this->input->post('jumlah_dewasa'),
            'jumlah_lansia'  => $this->input->post('jumlah_lansia'),
            'jumlah_disabilitas'  => $this->input->post('jumlah_disabilitas'),
            'jumlah_ibu_hamil'  => $this->input->post('jumlah_ibu_hamil'),
            'tempat'  => $this->input->post('tempat'),
            'keterangan'  => $this->input->post('keterangan')
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

        $sheet->setCellValue("A1", "jenis_pelayanan");
        $sheet->setCellValue("B1", "kategori_pelayanan");
        $sheet->setCellValue("C1", "tanggal_mulai");
        $sheet->setCellValue("D1", "tanggal_selesai");
        $sheet->setCellValue("E1", "foto");
        $sheet->setCellValue("F1", "jumlah_kk");
        $sheet->setCellValue("G1", "jumlah_jiwa");
        $sheet->setCellValue("H1", "jumlah_laki_laki");
        $sheet->setCellValue("I1", "jumlah_perempuan");
        $sheet->setCellValue("J1", "jumlah_bayi");
        $sheet->setCellValue("K1", "jumlah_balita");
        $sheet->setCellValue("L1", "jumlah_anak");
        $sheet->setCellValue("M1", "jumlah_remaja");
        $sheet->setCellValue("N1", "jumlah_dewasa");
        $sheet->setCellValue("O1", "jumlah_lansia");
        $sheet->setCellValue("P1", "jumlah_disabilitas");
        $sheet->setCellValue("Q1", "jumlah_ibu_hamil");
        $sheet->setCellValue("R1", "tempat");

        $pelaporan = $this->defaultModel->findBy(['is_active' => 1, 'jenis_pelayanan' => 'Sosial'])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["jenis_pelayanan"]);
            $sheet->setCellValue("B" . $x, $value["kategori_pelayanan"]);
            $sheet->setCellValue("C" . $x, $value["tanggal_mulai"]);
            $sheet->setCellValue("D" . $x, $value["tanggal_selesai"]);
            $sheet->setCellValue("E" . $x, $value["foto"]);
            $sheet->setCellValue("F" . $x, $value["jumlah_kk"]);
            $sheet->setCellValue("G" . $x, $value["jumlah_jiwa"]);
            $sheet->setCellValue("H" . $x, $value["jumlah_laki_laki"]);
            $sheet->setCellValue("I" . $x, $value["jumlah_perempuan"]);
            $sheet->setCellValue("J" . $x, $value["jumlah_bayi"]);
            $sheet->setCellValue("K" . $x, $value["jumlah_balita"]);
            $sheet->setCellValue("L" . $x, $value["jumlah_anak"]);
            $sheet->setCellValue("M" . $x, $value["jumlah_remaja"]);
            $sheet->setCellValue("N" . $x, $value["jumlah_dewasa"]);
            $sheet->setCellValue("O" . $x, $value["jumlah_lansia"]);
            $sheet->setCellValue("P" . $x, $value["jumlah_disabilitas"]);
            $sheet->setCellValue("Q" . $x, $value["jumlah_ibu_hamil"]);
            $sheet->setCellValue("R" . $x, $value["tempat"]);

            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pelayanan-sosial-seblang-wangi-' . date('dmy') . '.xlsx';

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
