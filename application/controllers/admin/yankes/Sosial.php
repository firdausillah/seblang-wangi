<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sosial extends CI_Controller
{
    public $defaultVariable = 'pelayanan_kesehatan_sosial';
    public $url_index = 'admin/yankes/sosial';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('YankesModel', 'defaultModel');
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

        $kategori_pelayanan = ['Kaki Palsu', 'Tangan Palsu'];

        if($page == 'index'){
            $data = [
                'title' => 'Pelayanan Sosial',
                $this->defaultVariable => $this->defaultModel->findBy(['jenis_pelayanan' => 'Sosial'])->result(),
                'content' => 'admin/yankes/table'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            $data = [
                'title' => 'Tambah Data',
                'content' => 'admin/yankes/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3',
                'kategori_pelayanan' => $kategori_pelayanan,
                'jenis_pelayanan' => 'sosial'
            ];

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => 'admin/yankes/form',
                'cropper' => 'components/cropper',
                'aspect' => '4/3',
                'kategori_pelayanan' => $kategori_pelayanan,
                'jenis_pelayanan' => 'sosial'
            ];

            $this->load->view('layout_admin/base', $data);
        }

    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('kategori_pelayanan'). $this->input->post('tanggal_selesai'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/yankes/sosial/';
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
            'is_approve' => 0,
            'jenis_pelayanan' => 'Sosial',
            'foto'  => $foto,
            'kategori_pelayanan'  => $this->input->post('kategori_pelayanan'),
            'tanggal_mulai'  => $this->input->post('tanggal_mulai'),
            'tanggal_selesai'  => $this->input->post('tanggal_selesai'),
            'jumlah_kk'  => $this->input->post('jumlah_kk'),
            'jumlah_jiwa'  => $this->input->post('jumlah_jiwa'),
            'jumlah_laki_laki'  => $this->input->post('jumlah_laki_laki'),
            'jumlah_perempuan'  => $this->input->post('jumlah_perempuan'),
            'jumlah_bayi'  => $this->input->post('jumlah_bayi'),
            'jumlah_balita'  => $this->input->post('jumlah_balita'),
            'jumlah_anak'  => $this->input->post('jumlah_anak'),
            'jumlah_remaja'  => $this->input->post('jumlah_remaja'),
            'jumlah_dewasa'  => $this->input->post('jumlah_dewasa'),
            'jumlah_lansia'  => $this->input->post('jumlah_lansia'),
            'tempat'  => $this->input->post('tempat'),
            'keterangan'  => $this->input->post('keterangan')
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
