<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{
    public function index()
    {
        $presensi = $this->Mpresensi->getAllPresensi()->result_array();

        $data = [
            'active' => 'Data Presensi',
            'presensi' => $presensi,
            'title' => 'Data Presensi'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-presensi', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
