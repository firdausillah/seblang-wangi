<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('CetakModel');
    }

    public function id_card_event_unit($id)
    {
        $data = [
            'title' => 'Print ID Card Event Unit',
            // 'event' => $this->CetakModel->get()->row(),
            'persons' => $this->CetakModel->get_persons($id)->result(),
            'content' => 'admin/event/print/id_card_event_unit',
            'base_url' => base_url('uploads/img/event/peserta/')
        ];
        $this->load->view('layout_print/base', $data);
    }

    public function id_card_event_unit_kordinator($id)
    {
        $data = [
            'title' => 'Print ID Card Event Unit Kordinator',
            // 'event' => $this->CetakModel->get()->row(),
            'kordinator' => $this->CetakModel->get_kordinator($id)->result(),
            'content' => 'admin/event/print/id_card_event_unit_kordinator',
            'base_url' => base_url('uploads/img/event/peserta/')
        ];
        $this->load->view('layout_print/base', $data);
    }

}
