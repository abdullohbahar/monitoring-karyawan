<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Laporan',
            'title' => 'Data Laporan'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-laporan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
