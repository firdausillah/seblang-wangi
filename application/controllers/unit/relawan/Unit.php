<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public $defaultVariable = 'unit';
    public $url_index = 'unit/relawan/unit';

    function __construct()
    {
        parent::__construct();
        $this->load->model('UnitModel', 'defaultModel');
        $this->load->model('Unit_kordinatorModel');
        $this->load->model('RelawanModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');
        $this->load->helper(array('form', 'url'));

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
            $id = $this->session->userdata('id');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'detail') {
            $id = $this->session->userdata('id');
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
                'content' => 'unit/relawan/unit_kordinator/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'edit_kordinator') {
            $id = $_GET['id'];
            $data = [
                'title' => 'Edit Data',
                'unit_kordinator' => $this->Unit_kordinatorModel->findBy(['id' => $id])->row(),
                'content' => 'unit/relawan/unit_kordinator/form'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'add_relawan') {

            $id_unit = (isset($_GET['id_unit']) ? $_GET['id_unit'] : '');

            $data = [
                'title' => 'Tambah Data',
                'unit' => $this->defaultModel->findBy(['id' => $id_unit])->row(),
                'content' => 'unit/relawan/relawan/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);

        } else if ($page == 'edit_relawan') {
            $id = $this->session->userdata('id');
            $data = [
                'title' => 'Edit Data',
                'unit_kordinator' => $this->Unit_kordinatorModel->findBy(['id' => $id])->row(),
                'content' => 'unit/relawan/unit_kordinator/form'
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
        $file_name = ($this->input->post('file_sk') ? $this->input->post('file_sk') : $slug);

        if ($file_pdf['name']) {
            $file_name = $this->save_file(
                $file_pdf,
                $slug,
                $folderPath
                // return $file -> nama file
            );
        }

        $data = [
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'jenis'  => $this->input->post('jenis'),
            'kategori'  => $this->input->post('kategori'),
            'email'  => $this->input->post('email'),
            'telepon'  => $this->input->post('telepon'),
            'alamat'  => $this->input->post('alamat'),
            'sk'  => $file_name
        ];

        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index. '?page=detail'));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index. '?page=detail'));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function save_kordinator()
    {
        $id = $this->input->post('id');
        $id_unit = $this->session->userdata('id');

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
                redirect(base_url('unit/relawan/unit?page=detail'));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Unit_kordinatorModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('unit/relawan/unit?page=detail'));
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
        redirect($this->url_index. '?page=detail');
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index. '?page=detail');
    }

    public function nonaktif_kordinator($id)
    {
        if ($this->Unit_kordinatorModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index. '?page=detail');
    }
}
