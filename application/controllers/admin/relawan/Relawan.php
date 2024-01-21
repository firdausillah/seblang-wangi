<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relawan extends CI_Controller
{
    public $defaultVariable = 'relawan';
    public $url_index = 'admin/relawan/relawan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('RelawanModel', 'defaultModel');
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
                'title' => 'Relawan',
                // $this->defaultVariable => $this->defaultModel->findBy(['id_unit' => 5])->result(),
                'content' => $this->url_index.'/table'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            print_r($_GET); exit();
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

    public function get($unit){
        switch ($unit) {
            case 'PMR-MULA':
            case 'PMR-MADYA':
            case 'PMR-WIRA':
                ;
                $where_kategori = ['unit_kategori' => explode('-', $unit)[1]];
                break;
            
            default:
                $where_kategori = ['unit_jenis' => $unit];
                break;
        }
        
        echo json_encode(['data' => $this->defaultModel->findBy($where_kategori)->result_array()]);
    }

    public function update_status(){
        // print_r($_POST); exit();
        $id = $_POST['id'];
        $is_active = $_POST['is_active'];

        if ($this->defaultModel->update(['id' => $id], ['is_active' => $is_active])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);

        }
    }

    public function save()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }
        
        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/'. $this->defaultVariable.'/';
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
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'tahun_perolehan'  => $this->input->post('tahun_perolehan'),
            'nilai_perolehan'  => $this->input->post('nilai_perolehan'),
            'sumber'  => $this->input->post('sumber'),
            'merk'  => $this->input->post('merk'),
            'type'  => $this->input->post('type'),
            'serial_number'  => $this->input->post('serial_number'),
            'jumlah'  => $this->input->post('jumlah'),
            'kondisi'  => $this->input->post('kondisi'),
            'pengguna'  => $this->input->post('pengguna'),
            'foto'  => $foto,
            'jenis_aset'  => 'kantor'
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
