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
        $this->load->model('Event_pesertaModel');
        $this->load->model('Event_unitModel');
        $this->load->model('Event_pendampingModel');
        $this->load->model('UnitModel');
        $this->load->model('RelawanModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'unit') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {
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
        } else if ($page == 'add_pendamping') {
            $data = [
                'title' => 'Edit Data',
                'content' => 'unit/event/pengajuan/form_pendamping',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
            
        } else if ($page == 'edit_pendamping') {
            $id_event_pendamping = $_GET['id_event_pendamping'];
            
            $data = [
                'title' => 'Edit Data',
                'event_pendamping' => $this->Event_pendampingModel->findBy(['id' => $id_event_pendamping])->row(),
                'content' => 'unit/event/pengajuan/form_pendamping',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
            
        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $event_unit = $this->Event_unitModel->findBy(['id' => $id, 'is_active != ' => 0])->row();
            $event_peserta = $this->Event_pesertaModel->findBy(['id_event_unit' => $event_unit->id, 'is_active' => 1])->result();
            $event_pendamping = $this->Event_pendampingModel->findBy(['id_event_unit' => $event_unit->id, 'is_active' => 1])->result();
            foreach ($event_peserta as $key => $value) {
                $id_relawan[] = $value->id_relawan;
            }
            
            $data = [
                'title' => 'Detail Data',
                'event' => $this->defaultModel->findBy(['id' => $event_unit->id_event])->row(),
                'event_unit' => $event_unit,
                'event_peserta' => $event_peserta,
                'event_pendamping' => $event_pendamping,
                // 'relawan' => $this->RelawanModel->relawanPeserta(['id_unit' => $event_unit->id_unit, 'is_active' => 1, 'is_approve' => 1],'nama ASC', $id_relawan)->result(),
                'relawan' => $this->RelawanModel->relawanPeserta(['id_unit' => $event_unit->id_unit, 'is_active' => 1, 'is_approve' => 1],'nama ASC')->result(),
                'content' => $this->url_index . '/detail',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];
            $this->load->view('layout_admin/base', $data);
        }
    }

    public function getUnitPeserta()
    {

        echo json_encode(['data' => $this->Event_pesertaModel->findBy(['id' => $_GET['id_peserta']])->row()]);
    }

    public function getUnitPendamping()
    {

        echo json_encode(['data' => $this->Event_pendampingModel->findBy(['id' => $_GET['id_pendamping']])->row()]);
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

            if ($this->upload->do_upload('file')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save_unit()
    {
        $id = $this->input->post('id');
        if (!$this->input->post('file_name')) {
            $slug = slugify('surat tugas'.'-'.$this->input->post('event_nama') . '-' . $this->input->post('unit_nama'));
        } else {
            $slug = explode('.', $this->input->post('file_name'))[0];
        }
        
        $file_pdf = $_FILES['file'];
        $folderPath_file = './uploads/file/' . $this->defaultVariable . '/unit/';
        $file = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);
        // print_r($folderPath_file);
        // exit();
        
        if ($file_pdf['name']) {
            $file = $this->save_file(
                $file_pdf,
                $slug,
                $folderPath_file
                // return $file -> nama file
            );
        }

        $data = [
            'is_active' => 1,
            'kordinator_nama'  => $this->input->post('kordinator_nama'),
            'kontak'  => $this->input->post('kontak'),
            'file_surat_tugas'  => $file
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Event_unitModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$id));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Event_unitModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$id));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function save_peserta()
    {

        $id = $this->input->post('id');
        $relawan_data = $this->RelawanModel->findBy(['id' => $this->input->post('id_relawan')])->row();
        $event_data = $this->Event_unitModel->findBy(['id' => $this->input->post('id_event_unit')])->row();

        // begin upload pdf
            if (!$this->input->post('file_name')) {
                $slug = slugify('File Persyaratan'.'-'. $relawan_data->nama . '-' . $event_data->event_nama);
            } else {
                $slug = explode('.', $this->input->post('file_name'))[0];
            }
            
            $file_pdf = $_FILES['file'];
            $folderPath_file = './uploads/file/' . $this->defaultVariable . '/peserta/';
            $file = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);

            if ($file_pdf['name']) {
                $file = $this->save_file(
                    $file_pdf,
                    $slug,
                    $folderPath_file
                    // return $file -> nama file
                );
            }
        // end upload pdf

        // begin upload foto
        if (!$this->input->post('gambar')) {
            $slug = slugify('foto'.'-'. $relawan_data->nama . '-' . $event_data->event_nama);
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/peserta/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }
        // end upload foto

        $data = [
            'is_active' => 1,
            'id_relawan'    =>  $this->input->post('id_relawan'),
            'id_unit'   =>  $relawan_data->id_unit,
            'id_event_unit' =>  $this->input->post('id_event_unit'),

            'relawan_kode'  =>  $relawan_data->kode,
            'relawan_nama'  =>  $relawan_data->nama,

            'unit_nama' =>  $relawan_data->unit_nama,
            'unit_kategori' =>  $relawan_data->unit_kategori,
            'unit_jenis'    =>  $relawan_data->unit_jenis,

            'file_persyaratan'  => $file,
            'foto'  => $foto
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Event_pesertaModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$this->input->post('id_event_unit')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Event_pesertaModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$this->input->post('id_event_unit')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function save_pendamping()
    {

        $id = $this->input->post('id_pendamping');
        $event_data = $this->Event_unitModel->findBy(['id' => $this->input->post('id_event_unit')])->row();


        // begin upload foto
        if (!$this->input->post('gambar')) {
            $slug = slugify('foto'.'-'. $this->input->post('nama') . '-' . $event_data->event_nama);
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/pendamping/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        
        // exit();
        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }
        // end upload foto

        $data = [
            'is_active' => 1,
            'id_unit'   =>  $event_data->id_unit,
            'id_event_unit' =>  $this->input->post('id_event_unit'),

            'nama' =>  $this->input->post('nama'),

            'unit_nama' =>  $event_data->unit_nama,
            'unit_kategori' =>  $event_data->unit_kategori,
            'unit_jenis'    =>  $event_data->unit_jenis,
            'foto'  => $foto
        ];



        if (empty($id)) {
            unset($id);
            if ($this->Event_pendampingModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$this->input->post('id_event_unit')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Event_pendampingModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('unit/event/pengajuan?page=detail&id='.$this->input->post('id_event_unit')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
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

    public function nonaktif_pendamping($id)
    {
        $event_unit = $this->Event_pendampingModel->findBy(['id' => $id])->row();
        if ($this->Event_pendampingModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect('unit/event/pengajuan?page=detail&id='. $event_unit->id_event_unit);
    }
}
