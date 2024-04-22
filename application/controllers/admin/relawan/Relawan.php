<?php
defined('BASEPATH') or exit('No direct script access allowed');

// jalur tambah, edit dan simpan berasal dari 2 menu, menu detail unit dan menu relawan itu sendiri

class Relawan extends CI_Controller
{
    public $defaultVariable = 'relawan';
    public $url_index = 'admin/relawan/relawan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('RelawanModel', 'defaultModel');
        $this->load->model('UnitModel');
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

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $unit = explode('-', (isset($_GET['unit']) ? $_GET['unit'] : ''));
            $filter = [
                'jenis' => isset($unit[0]) ? $unit[0] : '',
                'kategori' => isset($unit[1]) ? $unit[1] : ''
            ];
            
            // print_r($this->UnitModel->findBy($filter)->result());
            // exit();
            
            $data = [
                'title' => 'Edit Data',
                'unit' => $this->UnitModel->findBy($filter)->result(),
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index.'/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
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

    public function getById($id_unit){
        $data = ['id_unit' => $id_unit];
        
        echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
    }

    public function update_status(){
        // print_r($_POST); exit();
        $id = $_POST['id'];
        $is_approve = $_POST['is_approve'];

        if ($this->defaultModel->update(['id' => $id], ['is_approve' => $is_approve])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);

        }
    }

    public function save()
    {

        $redirect_to = (isset($_GET['unit']) ? 'admin/relawan/relawan?unit='. $_GET['unit'] : 'admin/relawan/unit?page=detail&id='. $_GET['id_unit']);
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
            'is_approve'  => 0,
            'password'  => $this->input->post('password'),
            'angkatan'  => $this->input->post('angkatan'),
            'expired_year'  => $this->input->post('expired_year'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),

            'unit_kategori'  => $unit_data->kategori,
            'unit_jenis'  => $unit_data->jenis,
            'unit_nama'  => $unit_data->nama,

            'telepon'  => $this->input->post('telepon'),
            'email'  => $this->input->post('email'),
            'foto'  => $foto
        ];
        
        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($redirect_to));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($redirect_to));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function exportExcel($unit)
    {
        print_r($unit); exit();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'F') as $key => $value) {
            $spreadsheet->getActiveSheet()->getColumnDimension($value)->setAutoSize(true);
        }

        $sheet->setCellValue("A1", "tanggal");
        $sheet->setCellValue("B1", "nama_lembaga");
        $sheet->setCellValue("C1", "lokasi");
        $sheet->setCellValue("D1", "jumlah_kantong");
        $sheet->setCellValue("E1", "keterangan");
        $sheet->setCellValue("F1", "jumlah_a");
        $sheet->setCellValue("G1", "jumlah_b");
        $sheet->setCellValue("H1", "jumlah_ab");
        $sheet->setCellValue("I1", "jumlah_o");



        $pelaporan = $this->defaultModel->findBy(['is_active' => 1])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["tanggal"]);
            $sheet->setCellValue("B" . $x, $value["nama_lembaga"]);
            $sheet->setCellValue("C" . $x, $value["lokasi"]);
            $sheet->setCellValue("D" . $x, $value["jumlah_kantong"]);
            $sheet->setCellValue("E" . $x, $value["keterangan"]);
            $sheet->setCellValue("F" . $x, $value["jumlah_a"]);
            $sheet->setCellValue("G" . $x, $value["jumlah_b"]);
            $sheet->setCellValue("H" . $x, $value["jumlah_ab"]);
            $sheet->setCellValue("I" . $x, $value["jumlah_o"]);


            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = $this->defaultVariable . '-seblang-wangi-' . date('dmy') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
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
