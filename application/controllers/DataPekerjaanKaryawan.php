<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPekerjaanKaryawan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Data Pekerjaan',
            'title' => 'Data Pekerjaan'
        ];

        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/data-pekerjaan', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
    }
}
