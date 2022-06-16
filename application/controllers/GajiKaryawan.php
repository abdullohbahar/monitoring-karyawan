<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GajiKaryawan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Gaji Karyawan',
            'title' => 'Data Gaji'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-gaji', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
