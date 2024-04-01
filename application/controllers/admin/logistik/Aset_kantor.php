<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Aset_kantor extends CI_Controller
{
    public $defaultVariable = 'aset_kantor';
    public $url_index = 'admin/logistik/aset_kantor';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_kantorModel', 'defaultModel');
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
                'title' => 'Aset Kantor',
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
            $slug = slugify($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }
        
        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/'. $this->defaultVariable.'/';
        $foto = $this->input->post('gambar'); //jika upload berhasil akan di replace oleh function save_foto()

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
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'tahun_perolehan'  => $this->input->post('tahun_perolehan'),
            'nilai_perolehan'  => $this->input->post('nilai_perolehan'),
            'sumber'  => $this->input->post('sumber'),
            'merk'  => $this->input->post('merk'),
            'type'  => $this->input->post('type'),
            'serial_number'  => $this->input->post('serial_number'),
            'jumlah'  => $this->input->post('jumlah'),
            'kondisi'  => $this->input->post('kondisi'),
            'pengguna'  => $this->input->post('pengguna'),
            'foto'  => $foto,
            'jenis_aset'  => 'kantor'
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
        $sheet->setCellValue("B1", "keterangan");
        $sheet->setCellValue("C1", "tanggal");
        $sheet->setCellValue("D1", "tahun_perolehan");
        $sheet->setCellValue("E1", "nilai_perolehan");
        $sheet->setCellValue("F1", "sumber");
        $sheet->setCellValue("G1", "merk");
        $sheet->setCellValue("H1", "type");
        $sheet->setCellValue("I1", "serial_number");
        $sheet->setCellValue("J1", "jumlah");
        $sheet->setCellValue("K1", "kondisi");
        $sheet->setCellValue("L1", "pengguna");
        $sheet->setCellValue("M1", "foto");
        $sheet->setCellValue("N1", "status_kepemilikan");
        $sheet->setCellValue("O1", "jenis_aset");

        $pelaporan = $this->defaultModel->findBy(['is_active' => 1, 'jenis_aset' => 'kantor'])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["nama"]);
            $sheet->setCellValue("B" . $x, $value["keterangan"]);
            $sheet->setCellValue("C" . $x, $value["created_on"]);
            $sheet->setCellValue("D" . $x, $value["tahun_perolehan"]);
            $sheet->setCellValue("E" . $x, $value["nilai_perolehan"]);
            $sheet->setCellValue("F" . $x, $value["sumber"]);
            $sheet->setCellValue("G" . $x, $value["merk"]);
            $sheet->setCellValue("H" . $x, $value["type"]);
            $sheet->setCellValue("I" . $x, $value["serial_number"]);
            $sheet->setCellValue("J" . $x, $value["jumlah"]);
            $sheet->setCellValue("K" . $x, $value["kondisi"]);
            $sheet->setCellValue("L" . $x, $value["pengguna"]);
            $sheet->setCellValue("M" . $x, $value["foto"]);
            $sheet->setCellValue("N" . $x, $value["status_kepemilikan"]);
            $sheet->setCellValue("O" . $x, $value["jenis_aset"]);
            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pelaporan-aset-kantor-seblang-wangi-' . date('dmy') . '.xlsx';

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
