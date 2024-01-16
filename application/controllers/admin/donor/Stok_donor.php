<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_donor extends CI_Controller
{
    public $defaultVariable = 'stok_donor';
    public $url_index = 'admin/donor/stok_donor';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('StokDonorModel', 'defaultModel');

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
                'title' => 'Stok Donor',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index.'/table'
            ];
    
            $this->load->view('layout_admin/base', $data);

        }else if($page == 'add'){
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index.'/form'
            ];

            $this->load->view('layout_admin/base', $data);

        }else if($page == 'edit'){
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index.'/form'
            ];

            $this->load->view('layout_admin/base', $data);
        }

    }

    public function save()
    {
        $id = $this->input->post('id');
        $data = [
            'tanggal_update'    => $this->input->post('tanggal_update'),
            'a' => $this->input->post('a'),
            'b' => $this->input->post('b'),
            'ab'    => $this->input->post('ab'),
            'o' => $this->input->post('o'),
            'wb_a'  => $this->input->post('wb_a'),
            'wb_b'  => $this->input->post('wb_b'),
            'wb_ab' => $this->input->post('wb_ab'),
            'wb_o'  => $this->input->post('wb_o'),
            'prc_a' => $this->input->post('prc_a'),
            'prc_b' => $this->input->post('prc_b'),
            'prc_ab'    => $this->input->post('prc_ab'),
            'prc_o' => $this->input->post('prc_o'),
            'tc_a'  => $this->input->post('tc_a'),
            'tc_b'  => $this->input->post('tc_b'),
            'tc_ab' => $this->input->post('tc_ab'),
            'tc_o'  => $this->input->post('tc_o'),
            'fpp_a' => $this->input->post('fpp_a'),
            'fpp_b' => $this->input->post('fpp_b'),
            'fpp_ab'    => $this->input->post('fpp_ab'),
            'fpp_o' => $this->input->post('fpp_o'),
            'keterangan'    => $this->input->post('keterangan'),
            'is_active'    => 1
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
