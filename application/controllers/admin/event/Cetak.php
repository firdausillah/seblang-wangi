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

    public function id_card_event_peserta($id_event_peserta)
    {
        $data = [
            'title' => 'Print ID Card Event Peserta',
            // 'event' => $this->CetakModel->get()->row(),
            'person' => $this->CetakModel->get_person($id_event_peserta)->row(),
            'content' => 'admin/event/print/id_card_event_peserta',
            'base_url' => base_url('uploads/img/event/peserta/')
        ];
        $this->load->view('layout_print/base', $data);
    }

    public function id_card_event_unit_pendamping($id)
    {
        $data = [
            'title' => 'Print ID Card Event Unit Pendamping',
            // 'event' => $this->CetakModel->get()->row(),
            'pendamping' => $this->CetakModel->get_pendamping($id)->result(),
            'content' => 'admin/event/print/id_card_event_unit_pendamping',
            'base_url' => base_url('uploads/img/event/peserta/')
        ];
        $this->load->view('layout_print/base', $data);
    }

}
