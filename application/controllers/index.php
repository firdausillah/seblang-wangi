<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'superadmin') {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'content' => 'admin/dashboard'
        ];

        $this->load->view('layout_admin/base', $data);

        // redirect(base_url('login'));
    }

}
