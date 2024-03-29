<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public $defaultVariable = 'event';
    public $url_index = 'admin/event/event';

    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('Event_pesertaModel');
        $this->load->model('Event_unitModel');
        $this->load->model('Event_pendampingModel');
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
                'title' => 'Event',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4',
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4',
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Detail Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'event_unit' => $this->Event_unitModel->findBy(['id_event' => $id, 'is_active != ' => 0])->result(),
                'content' => $this->url_index . '/detail'
            ];
            // print_r($data['unit_peserta']);
            // exit();

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function getPeserta()
    {
        if($_GET['id_event_unit']!=null){
            $data = [
                    'id_event_unit' => $_GET['id_event_unit'], 
                    'is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_pesertaModel->findBy($data)->result_array()]);
        }else{
            echo json_encode([]);
        }

    }

    public function getPendamping()
    {
        if($_GET['id_event_unit']!=null){
            $data = [
                    'id_event_unit' => $_GET['id_event_unit'], 
                    'is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_pendampingModel->findBy($data)->result_array()]);
        }else{
            echo json_encode([]);
        }

    }

    public function getUnitArray()
    {
        if($_GET['id_event']!=null){
            $data = [
                    'id_event' => $_GET['id_event'], 
                    'is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_unitModel->findBy($data)->result()]);
        }else{
            echo json_encode([]);
        }
    }

    public function getUnit()
    {
        if($_GET['id_event_unit']!=null){
            $data = [
                    'id' => $_GET['id_event_unit'], 
                    'is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_unitModel->findBy($data)->row()]);
        }else{
            echo json_encode([]);
        }
    }

    public function update_status_event_unit()
    {
        if ($this->Event_unitModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }
    
        public function update_catatan_unit()
        {
            // print_r($_POST); exit();
            if ($this->Event_unitModel->update(['id' => $_POST['id_event_unit']], ['keterangan' => $_POST['event_unit_keterangan']])) {
                echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
                // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
            }
        }

    public function update_status_event_peserta()
    {
        if ($this->Event_pesertaModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function update_catatan_peserta()
    {
        // print_r($_POST); exit();
        if ($this->Event_pesertaModel->update(['id' => $_POST['id_event_peserta']], ['keterangan' => $_POST['event_peserta_keterangan']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
            // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
            // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
        }
    }

    public function update_status_event_pendamping()
    {
        if ($this->Event_pendampingModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function update_catatan_pendamping()
    {
        // print_r($_POST); exit();
        if ($this->Event_pendampingModel->update(['id' => $_POST['id_event_pendamping']], ['keterangan' => $_POST['event_pendamping_keterangan']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
            // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
            // redirect(base_url('admin/event/event?page=detail&id='.$_POST['id_event']));
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
        // $file_foto = $this->input->post('file_foto');

        // if ($file_foto) {
        //     echo 'ini bro';
        // }
        // print_r($file_foto); exit();
        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        if (!$this->input->post('file_info')) {
            $slug_file = slugify($this->input->post('nama'));
        } else {
            $slug_file = explode('.', $this->input->post('file_info'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/admin/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $file_pdf = (isset($_FILES['file_info'])? $_FILES['file_info']: $file_pdf['name'] = false);
        $folderPath_file = './uploads/file/' . $this->defaultVariable . '/admin/';
        $file_name = ($this->input->post('file_info_name') ? $this->input->post('file_info_name') : $slug);

        // print_r(!isset($file_pdf['name'])); exit();
        if (!isset($file_pdf['name'])) {
            $file_name = $this->save_file(
                $file_pdf,
                $slug_file,
                $folderPath_file
                // return $file -> nama file
            );
        }

        // print_r($_POST); exit();
        $data = [
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'tanggal_buka_pendaftaran'  => $this->input->post('tanggal_buka_pendaftaran'),
            'tanggal_tutup_pendaftaran'  => $this->input->post('tanggal_tutup_pendaftaran'),
            'keterangan'  => $this->input->post('keterangan'),
            'jenis'  => $this->input->post('jenis'),
            'unit_peserta'  => implode(',', $this->input->post('unit_peserta')),
            'foto'  => $foto,
            'file_info'  => $file_name
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
