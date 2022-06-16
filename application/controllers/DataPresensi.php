<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Data Presensi',
            'title' => 'Data Presensi'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-presensi', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
