<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPekerjaan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Data Pekerjaan',
            'title' => 'Data Pekerjaan'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-pekerjaan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
