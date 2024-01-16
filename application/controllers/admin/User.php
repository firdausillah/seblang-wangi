<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->UserModel->get()->result(),
            'content' => 'admin/user/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        $data = [
            'nama' => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role'    => $this->input->post('role')
        ];
        
        if ($this->UserModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/user'));
    }

    public function edit($id){
        // $user = $this->UserModel->findBy(['id' => $id])->row();

        // print_r($user->nama); exit();
        $data = [
            'title' => 'Edit User',
            'user' => $this->UserModel->findBy(['id' => $id])->row(),
            'content' => 'admin/user/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        $data = [
            'nama' => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role'    => $this->input->post('role')
        ];
        
        if ($this->UserModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/user'));
    }

    public function delete($id){
        if ($this->UserModel->delete(['id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/user');
    }
}
