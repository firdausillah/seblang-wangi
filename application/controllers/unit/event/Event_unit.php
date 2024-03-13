<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_unit extends CI_Controller
{
    public $defaultVariable = 'event_unit';
    public $url_index = 'unit/event/event';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_unitModel', 'defaultModel');
        $this->load->model('EventModel');
        $this->load->model('RelawanModel');
        $this->load->model('UnitModel');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'unit') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Event Unit',
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

    public function save($id_event)
    {
        $event = $this->EventModel->findBy(['id' => $id_event])->row();
        $unit = $this->UnitModel->findBy(['id' => $_SESSION['id']])->row();

        $data = [            
            'id_event'  => $event->id,
            'id_unit'   => $unit->id,
            'is_active' => 1,

            'event_nama'    => $event->nama,

            'unit_jenis' => $unit->jenis,
            'unit_kategori' => $unit->kategori,
            'unit_nama' => $unit->nama,
        ];

        if ($this->defaultModel->add($data)) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil mendaftar di event'. $event->nama.'. Silahkan menuju ke halaman pengajuan untuk melengkapi berkas pendaftaran.']);
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
