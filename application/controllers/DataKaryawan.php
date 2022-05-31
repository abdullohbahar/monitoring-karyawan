<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKaryawan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Data Karyawan'
        ];

        $this->load->view('template/header');
        $this->load->view('admin/data-karyawan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
