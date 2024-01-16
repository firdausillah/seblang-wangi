<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');

        if ($this->session->userdata('role') != 'superadmin') {
            redirect(base_url("login"));
        }
    }

    public function mobile_unit()
    {
        $data = [
            'title' => 'Mobile Unit',
            'profile' => $this->ProfileModel->findBy(['id' => 1])->row(),
            'content' => 'admin/donor/mobile_unit'
        ];

        $this->load->view('layout_admin/base', $data);
    }
}
