<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{
    public $defaultVariable = 'pelaporan';
    public $url_index = 'admin/bencana/pelaporan';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('PelaporanModel', 'defaultModel');
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
                'title' => 'Pelaporan',
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
            'tanggal'  => $this->input->post('tanggal'),
            'jalan'  => $this->input->post('jalan'),
            'alamat'  => $this->input->post('alamat'),
            'kab_kota'  => $this->input->post('kab_kota'),
            'provinsi'  => $this->input->post('provinsi'),
            'kejadian'  => $this->input->post('kejadian'),
            'kegiatan'  => $this->input->post('kegiatan'),
            'jumlah_terdampak_kk'  => $this->input->post('jumlah_terdampak_kk'),
            'jumlah_terdampak_jiwa'  => $this->input->post('jumlah_terdampak_jiwa'),
            'jumlah_mengungsi_jiwa'  => $this->input->post('jumlah_mengungsi_jiwa'),
            'jumlah_luka_ringan'  => $this->input->post('jumlah_luka_ringan'),
            'jumlah_luka_berat'  => $this->input->post('jumlah_luka_berat'),
            'jumlah_meninggal'  => $this->input->post('jumlah_meninggal'),
            'jumlah_hilang'  => $this->input->post('jumlah_hilang'),
            'jumlah_rumah_rusak_berat'  => $this->input->post('jumlah_rumah_rusak_berat'),
            'jumlah_rumah_rusak_sedang'  => $this->input->post('jumlah_rumah_rusak_sedang'),
            'jumlah_rumah_rusak_ringan'  => $this->input->post('jumlah_rumah_rusak_ringan'),
            'jumlah_jalan_rusak'  => $this->input->post('jumlah_jalan_rusak'),
            'jumlah_jembatan'  => $this->input->post('jumlah_jembatan'),
            'jumlah_faskes'  => $this->input->post('jumlah_faskes'),
            'jumlah_fasilitas_pendidikan'  => $this->input->post('jumlah_fasilitas_pendidikan'),
            'jumlah_tempat_ibadah'  => $this->input->post('jumlah_tempat_ibadah'),
            'jumlah_fasilitas_umum'  => $this->input->post('jumlah_fasilitas_umum'),
            'akses_telepon_internet'  => $this->input->post('akses_telepon_internet'),
            'akses_listrik'  => $this->input->post('akses_listrik'),
            'akses_air_bersih'  => $this->input->post('akses_air_bersih'),
            'food_item'  => $this->input->post('food_item'),
            'non_food_item'  => $this->input->post('non_food_item'),
            'jumlah_penerima_manfaat'  => $this->input->post('jumlah_penerima_manfaat'),
            'jumlah_laki_laki'  => $this->input->post('jumlah_laki_laki'),
            'jumlah_perempuan'  => $this->input->post('jumlah_perempuan')
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
