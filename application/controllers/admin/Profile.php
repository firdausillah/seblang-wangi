<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }


    public function index()
    {
        $data = [
            'title' => 'Edit Profile',
            'profile' => $this->ProfileModel->findBy(['id' => 1])->row(),
            'content' => 'admin/profile/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update()
    {
        // print_r($this->input->post('foto')); exit();
        $logo = $this->input->post('logo');
        $id = 1;
        if (!empty($_FILES['gambar']['name'])) { // $_FILES untuk mengambil data logo
            $cfg = [
                'upload_path' => './assets/img',
                'allowed_types' => 'png|jpg|gif|jpeg',
                'file_name' => 'logo',
                'overwrite' => (empty($logo) ? FALSE : TRUE),
                'max_size' => '2028',
            ];
            // if (!empty($logo)) $cfg['file_name'] = $kode;
            // print_r($cfg); exit();
            $this->load->library('upload', $cfg);

            if ($this->upload->do_upload('gambar')) $logo = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }
        // print_r($logo); exit();
        $data = [
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'nama_kepalasekolah' => $this->input->post('nama_kepalasekolah'),
            'logo' => $logo,
            'alamat' => $this->input->post('alamat'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'cp_1' => $this->input->post('cp_1'),
            'cp_2' => $this->input->post('cp_2'),
            'website' => $this->input->post('website'),
            'sosial_media_1' => $this->input->post('sosial_media_1'),
            'sosial_media_2' => $this->input->post('sosial_media_2'),
            'sosial_media_3' => $this->input->post('sosial_media_3'),

        ];

        if (empty($id)) {
            unset($id);
            if (!$this->ProfileModel->add($data)) exit('Insert Data Error.');
        } else {
            // print_r(['foto' => $foto]); exit();

            if (!$this->ProfileModel->update(['id' => 1], $data)) exit("Update Data Error.");
        }

        $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        redirect(base_url('admin/profile'));


        // if ($this->ProfileModel->update(['id' => 1], $data)) {
        //     $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        // } else {
        //     $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        // }
        
    }

}
