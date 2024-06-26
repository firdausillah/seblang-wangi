<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Unit extends CI_Controller
{
    public $defaultVariable = 'unit';
    public $url_index = 'admin/relawan/unit';

    function __construct()
    {
        parent::__construct();
        $this->load->model('UnitModel', 'defaultModel');
        $this->load->model('Unit_kordinatorModel');
        $this->load->model('RelawanModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');
        $this->load->helper(array('form', 'url'));

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Unit',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Detail Data',
                'unit' => $this->defaultModel->findBy(['id' => $id])->row(),
                'relawan' => $this->RelawanModel->findBy(['id_unit' => $id])->result(),
                'unit_kordinator' => $this->Unit_kordinatorModel->findBy(['id_unit' => $id])->result(),
                'content' => $this->url_index . '/detail'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'add_kordinator') {
            $data = [
                'title' => 'Tambah Data',
                'content' => 'admin/relawan/unit_kordinator/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'edit_kordinator') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                'unit_kordinator' => $this->Unit_kordinatorModel->findBy(['id' => $id])->row(),
                'content' => 'admin/relawan/unit_kordinator/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'add_relawan') {

            $id_unit = (isset($_GET['id_unit']) ? $_GET['id_unit'] : '');

            $data = [
                'title' => 'Tambah Data',
                'unit' => $this->defaultModel->findBy(['id' => $id_unit])->row(),
                'content' => 'admin/relawan/relawan/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'edit_relawan') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $id_unit = (isset($_GET['id_unit']) ? $_GET['id_unit'] : '');

            $data = [
                'title' => 'Edit Data',
                'unit' => $this->defaultModel->findBy(['id' => $id_unit])->row(),
                'relawan' => $this->RelawanModel->findBy(['id' => $id])->row(),
                'content' => 'admin/relawan/relawan/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function save_file($file,$slug, $folderPath)
    {
        if (!empty($file)) { // $_FILES untuk mengambil data file
            $cfg = [
                'upload_path' => $folderPath,
                'allowed_types' => 'pdf',
                'file_name' => $slug,
                'overwrite' => (empty($file) ? FALSE : TRUE),
                // 'max_size' => '2028',
            ];
            $this->load->library('upload', $cfg);

            if ($this->upload->do_upload('sk')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('file_sk')) {
            $slug = slugify($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('file_sk'))[0];
        }

        $file_pdf = $_FILES['sk'];
        $folderPath = './uploads/file/' . $this->defaultVariable . '/';
        $file = ($this->input->post('file_sk') ? $this->input->post('file_sk') : $slug);

        if ($file_pdf['name']) {
            $file = $this->save_file(
                $file_pdf,
                $slug,
                $folderPath
                // return $file -> nama file
            );
        }

        $data = [
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'is_active'  => '1',
            'is_approve'  => $this->input->post('is_approve'),
            'jenis'  => $this->input->post('jenis'),
            'kategori'  => $this->input->post('kategori'),
            'email'  => $this->input->post('email'),
            'telepon'  => $this->input->post('telepon'),
            'alamat'  => $this->input->post('alamat'),
            'sk'  => $file
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

    public function save_kordinator()
    {
        $id = $this->input->post('id');
        $id_unit = $this->input->post('id_unit');

        $data = [
            'nama'  => $this->input->post('nama'),
            'is_active'  => 1,
            'id_unit'  => $id_unit,
            'tahun_mulai'  => $this->input->post('tahun_mulai'),
            'tahun_selesai'  => $this->input->post('tahun_selesai')
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Unit_kordinatorModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('admin/relawan/unit?page=detail&id='.$id_unit));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Unit_kordinatorModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('admin/relawan/unit?page=detail&id='.$id_unit));
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
        $sheet->setCellValue("D1", "jenis");
        $sheet->setCellValue("E1", "kategori");
        $sheet->setCellValue("F1", "email");
        $sheet->setCellValue("G1", "telepon");
        $sheet->setCellValue("H1", "alamat");
        $sheet->setCellValue("I1", "sk");
        $sheet->setCellValue("J1", "password");
        $sheet->setCellValue("K1", "status_pendaftaran");

        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["nama"]);
            $sheet->setCellValue("B" . $x, $value["kode"]);
            $sheet->setCellValue("C" . $x, $value["keterangan"]);
            $sheet->setCellValue("D" . $x, $value["jenis"]);
            $sheet->setCellValue("E" . $x, $value["kategori"]);
            $sheet->setCellValue("F" . $x, $value["email"]);
            $sheet->setCellValue("G" . $x, $value["telepon"]);
            $sheet->setCellValue("H" . $x, $value["alamat"]);
            $sheet->setCellValue("I" . $x, $value["sk"]);
            $sheet->setCellValue("J" . $x, $value["password"]);
            $sheet->setCellValue("K" . $x, ($value["is_approve"]==1?'Disetujui':($value["is_approve"]==0?"Diperiksa":"Ditolak")));

            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = $this->defaultVariable . '-seblang-wangi-' . date('dmy') . '.xlsx';

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

    public function nonaktif_kordinator($id)
    {
        if ($this->Unit_kordinatorModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif_relawan($id)
    {
        if ($this->RelawanModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
