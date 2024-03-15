<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sertifikat extends CI_Controller
{
    public $defaultVariable = 'sertifikat';
    public $url_index = 'admin/event/sertifikat';

    function __construct()
    {
        parent::__construct();
        $this->load->model('SertifikatModel', 'defaultModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

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
                'title' => 'Sertifikat',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function save_file($file, $slug, $folderPath)
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

            if ($this->upload->do_upload('file')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('file_name')) {
            $slug = slugify('Sertifikat'.'-'.$this->input->post('pelatihan_nama'). '-' .$this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('file_name'))[0];
        }

        $file_pdf = $_FILES['file'];
        $folderPath_file = './uploads/file/' . $this->defaultVariable . `/`;
        $file = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);

        if ($file_pdf['name']) {
            $file = $this->save_file(
                $file_pdf,
                $slug,
                $folderPath_file
                // return $file -> nama file
            );
        }

        $data = [
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'pelatihan_nama'  => $this->input->post('pelatihan_nama'),
            'jenis'  => $this->input->post('jenis'),
            'nomor'  => $this->input->post('nomor'),
            'sebagai'  => $this->input->post('sebagai'),
            'penyelenggara'  => $this->input->post('penyelenggara'),
            'penyelenggara_nama'  => $this->input->post('penyelenggara_nama'),
            'tahun'  => $this->input->post('tahun'),
            'nilai_akhir'  => $this->input->post('nilai_akhir'),
            'kegiatan_tempat'  => $this->input->post('kegiatan_tempat'),
            'kegiatan_tanggal'  => $this->input->post('kegiatan_tanggal'),
            'standart_minimum_kelulusan'  => $this->input->post('standart_minimum_kelulusan'),
            'file'  => $file
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
