<?php
defined('BASEPATH') or exit('No direct script access allowed');

// jalur tambah, edit dan simpan berasal dari 2 menu, menu detail unit dan menu relawan itu sendiri

class Relawan extends CI_Controller
{
    public $defaultVariable = 'relawan';
    public $url_index = 'unit/relawan/relawan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('RelawanModel', 'defaultModel');
        $this->load->model('UnitModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'unit') {
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
    
            $this->load->view('layout_unit/base', $data);

        }else if($page == 'add'){
            $unit = explode('-', (isset($_GET['unit']) ? $_GET['unit'] : ''));
            $filter = [
                'jenis' => isset($unit[0]) ? $unit[0] : '', 
                'kategori' => isset($unit[1])?$unit[1]:''
            ];
            
            $data = [
                'title' => 'Tambah Data',
                'unit' => $this->UnitModel->findBy($filter)->result(),
                'content' => $this->url_index.'/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_unit/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $unit = explode('-', (isset($_GET['unit']) ? $_GET['unit'] : ''));
            $filter = [
                'jenis' => isset($unit[0]) ? $unit[0] : '',
                'kategori' => isset($unit[1]) ? $unit[1] : ''
            ];
            
            $data = [
                'title' => 'Edit Data',
                'unit' => $this->UnitModel->findBy($filter)->result(),
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index.'/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_unit/base', $data);
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

    public function getById($id_unit){
        $data = ['id_unit' => $id_unit];
        
        echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
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

        $id_unit = $this->input->post('id_unit');
        $unit_data = $this->UnitModel->findBy(['id' => $id_unit])->row();
        // print_r($unit_data); exit();

        $data = [
            'is_active' => 1,
            'id_unit'  => $id_unit,
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

            'telepon'  => $this->input->post('telepon'),
            'foto'  => $foto
        ];
        
        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('unit/relawan/unit?page=detail'));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
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
