<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Aset_kendaraan extends CI_Controller
{
    public $defaultVariable = 'aset_kendaraan';
    public $url_index = 'admin/logistik/aset_kendaraan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_kendaraanModel', 'defaultModel');
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

        if($page == 'index'){
            $data = [
                'title' => 'Aset Kendaraan',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index.'/table'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index.'/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index.'/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        }

    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('type'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }
        
        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/'. $this->defaultVariable.'/';
        $foto = ($this->input->post('gambar')?$this->input->post('gambar'):$slug); //jika upload berhasil akan di replace oleh function save_foto()

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
            'keterangan'  => $this->input->post('keterangan'),
            'tahun_perolehan'  => $this->input->post('tahun_perolehan'),
            'nilai_perolehan'  => $this->input->post('nilai_perolehan'),
            'sumber'  => $this->input->post('sumber'),
            'status_kepemilikan'  => $this->input->post('status_kepemilikan'),
            'merk'  => $this->input->post('merk'),
            'type'  => $this->input->post('type'),
            'jenis_kendaraan'  => $this->input->post('jenis_kendaraan'),
            // 'jumlah'  => $this->input->post('jumlah'),
            'kondisi'  => $this->input->post('kondisi'),
            'no_plat'  => $this->input->post('no_plat'),
            'no_rangka'  => $this->input->post('no_rangka'),
            'no_mesin'  => $this->input->post('no_mesin'),
            'no_bpkb'  => $this->input->post('no_bpkb'),
            'tahun_produksi'  => $this->input->post('tahun_produksi'),
            'jenis_bbm'  => $this->input->post('jenis_bbm'),
            'tanggal_pajak_tahunan'  => $this->input->post('tanggal_pajak_tahunan'),
            'foto'  => $foto
        ];

        // print_r($data); exit();
        
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

        $sheet->setCellValue("A1", "tanggal_input");
        $sheet->setCellValue("B1", "tahun_perolehan");
        $sheet->setCellValue("C1", "nilai_perolehan");
        $sheet->setCellValue("D1", "sumber");
        $sheet->setCellValue("E1", "status_kepemilikan");
        $sheet->setCellValue("F1", "merk");
        $sheet->setCellValue("G1", "type");
        $sheet->setCellValue("H1", "jenis_kendaraan");
        $sheet->setCellValue("I1", "jumlah");
        $sheet->setCellValue("J1", "kondisi");
        $sheet->setCellValue("K1", "no_plat");
        $sheet->setCellValue("L1", "no_rangka");
        $sheet->setCellValue("M1", "no_mesin");
        $sheet->setCellValue("N1", "no_bpkb");
        $sheet->setCellValue("O1", "tahun_produksi");
        $sheet->setCellValue("P1", "jenis_bbm");
        $sheet->setCellValue("Q1", "tanggal_pajak_tahunan");
        $sheet->setCellValue("R1", "foto");


        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["created_on"]);
            $sheet->setCellValue("B" . $x, $value["tahun_perolehan"]);
            $sheet->setCellValue("C" . $x, $value["nilai_perolehan"]);
            $sheet->setCellValue("D" . $x, $value["sumber"]);
            $sheet->setCellValue("E" . $x, $value["status_kepemilikan"]);
            $sheet->setCellValue("F" . $x, $value["merk"]);
            $sheet->setCellValue("G" . $x, $value["type"]);
            $sheet->setCellValue("H" . $x, $value["jenis_kendaraan"]);
            $sheet->setCellValue("I" . $x, $value["jumlah"]);
            $sheet->setCellValue("J" . $x, $value["kondisi"]);
            $sheet->setCellValue("K" . $x, $value["no_plat"]);
            $sheet->setCellValue("L" . $x, $value["no_rangka"]);
            $sheet->setCellValue("M" . $x, $value["no_mesin"]);
            $sheet->setCellValue("N" . $x, $value["no_bpkb"]);
            $sheet->setCellValue("O" . $x, $value["tahun_produksi"]);
            $sheet->setCellValue("P" . $x, $value["jenis_bbm"]);
            $sheet->setCellValue("Q" . $x, $value["tanggal_pajak_tahunan"]);
            $sheet->setCellValue("R" . $x, $value["foto"]);

            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pelaporan-aset-kendaraan-seblang-wangi-' . date('dmy') . '.xlsx';

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
