<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_peserta extends CI_Controller
{
    public $defaultVariable = 'event_peserta';
    public $url_index = 'relawan/pelatihan/event';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_pesertaModel', 'defaultModel');
        $this->load->model('EventModel');
        $this->load->model('RelawanModel');
        $this->load->model('UnitModel');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'relawan') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Event Peserta',
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
            // print_r(isset($_GET['id'])); exit();
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form'
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

            if ($this->upload->do_upload('file_info')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save()
    {
        print_r($_GET);
        print_r($_POST);
        exit();
        $event = $this->EventModel->findBy(['id' => $_GET['id_event']])->row();
        $relawan = $this->RelawanModel->findBy(['id' => $_GET['id_relawan']])->row();

        $data = [            
            'id_event'  => $event->id,
            'id_relawan'    => $relawan->id,
            'id_unit'   => $relawan->id_unit,
            'is_active' => 2,

            'event_nama'    => $event->nama,

            'relawan_kode'  => $relawan->kode,
            'relawan_nama'  => $relawan->nama,

            'unit_jenis' => $relawan->unit_jenis,
            'unit_kategori' => $relawan->unit_kategori,
            'unit_nama' => $relawan->unit_nama,
        ];

        if ($this->defaultModel->add($data)) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil mendaftar di event'. $event->nama.'. Silahkan pantau halaman event untuk mengetahui apakah pendaftaran anda di approve atau tidak.']);
            redirect(base_url($this->url_index));
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
