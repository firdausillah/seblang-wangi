<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_kendaraan extends CI_Controller
{
    public $defaultVariable = 'aset_kendaraan';
    public $url_index = 'admin/logistik/aset_kendaraan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_kendaraanModel', 'defaultModel');
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
                'title' => 'Aset Kendaraan',
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
            $slug = slugify($this->input->post('type'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }
        
        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/'. $this->defaultVariable.'/';
        $foto = ($this->input->post('gambar')?$this->input->post('gambar'):$slug); //jika upload berhasil akan di replace oleh function save_foto()

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
            'keterangan'  => $this->input->post('keterangan'),
            'tahun_perolehan'  => $this->input->post('tahun_perolehan'),
            'nilai_perolehan'  => $this->input->post('nilai_perolehan'),
            'sumber'  => $this->input->post('sumber'),
            'status_kepemilikan'  => $this->input->post('status_kepemilikan'),
            'merk'  => $this->input->post('merk'),
            'type'  => $this->input->post('type'),
            'jenis_kendaraan'  => $this->input->post('jenis_kendaraan'),
            // 'jumlah'  => $this->input->post('jumlah'),
            'kondisi'  => $this->input->post('kondisi'),
            'no_plat'  => $this->input->post('no_plat'),
            'no_rangka'  => $this->input->post('no_rangka'),
            'no_mesin'  => $this->input->post('no_mesin'),
            'no_bpkb'  => $this->input->post('no_bpkb'),
            'tahun_produksi'  => $this->input->post('tahun_produksi'),
            'jenis_bbm'  => $this->input->post('jenis_bbm'),
            'tanggal_pajak_tahunan'  => $this->input->post('tanggal_pajak_tahunan'),
            'foto'  => $foto
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
