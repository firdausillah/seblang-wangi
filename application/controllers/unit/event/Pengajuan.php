<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public $defaultVariable = 'event';
    public $url_index = 'unit/event/pengajuan';

    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('UnitModel');
        $this->load->model('Event_pesertaModel');
        $this->load->model('Event_unitModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'unit') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        // print_r();
        // print_r($this->Event_unitModel->last_query());
        // exit();

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');
        $unit = $this->UnitModel->findBy(['id' => $_SESSION['id']])->row();
        $unit_peserta = $unit->jenis . ' ' . $unit->kategori; 

        if ($page == 'index') {
            $data = [
                'title' => 'Event Tersedia',
                'event_unit' => $this->Event_unitModel->getUnitTerdaftar('WHERE a.is_active = 1 AND a.id_unit = ' . $_SESSION['id'])->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            
        } else if ($page == 'edit') {
            
        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $event_unit = $this->Event_unitModel->findBy(['id' => $id, 'is_active != ' => 0])->row();
            $data = [
                'title' => 'Detail Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $event_unit->id_event])->row(),
                'event_unit' => $event_unit,
                'event_peserta' => $this->Event_pesertaModel->findBy(['id_event_unit' => $event_unit->id])->result(),
                'content' => $this->url_index . '/detail'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function getById()
    {
        switch ($_GET['is_active']) {
            case 'AKTIF':
                $is_active = 1;
                break;
            case 'REGISTER':
                $is_active = 2;
                break;

            default:
                $is_active = 0;
                break;
        }
        $data = [
            'id_event' => $_GET['id'],
            'is_active' => $is_active
        ];

        echo json_encode(['data' => $this->Event_pesertaModel->findBy($data)->result_array()]);
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
        $folderPath = './uploads/img/' . $this->defaultVariable . '/';
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
            'foto'  => $foto,
            'keterangan'  => $this->input->post('keterangan'),
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
