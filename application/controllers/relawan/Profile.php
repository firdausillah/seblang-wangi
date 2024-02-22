<?php
defined('BASEPATH') or exit('No direct script access allowed');

// jalur tambah, edit dan simpan berasal dari 2 menu, menu detail unit dan menu relawan itu sendiri

class Profile extends CI_Controller
{
    public $defaultVariable = 'relawan';
    public $url_index = 'relawan/profile';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('RelawanModel', 'defaultModel');
        $this->load->model('UnitModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'relawan') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }

    }

    public function index()
    {

        $page = (isset($_GET['page'])?$_GET['page']:'index');
        if($page == 'index'){
            $data = [
                'title' => 'Relawan',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $_SESSION['id']])->row(),
                'content' => $this->url_index.'/index',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }

    }
    
    public function save()
    {
        $id = $this->input->post('id');
        $data = [
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'kode'  => $this->input->post('kode'),
            'keterangan'  => $this->input->post('keterangan'),
            'is_active'  => $this->input->post('is_active'),
            'angkatan'  => $this->input->post('angkatan'),
            'expired_year'  => $this->input->post('expired_year'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),

            'unit_kategori'  => $unit_data->kategori,
            'unit_jenis'  => $unit_data->jenis,
            'unit_nama'  => $unit_data->nama,

            'telepon'  => $this->input->post('telepon')
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

    public function image_save(){
        $id = $_SESSION['id'];
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/';
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
            'foto'  => $foto
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
