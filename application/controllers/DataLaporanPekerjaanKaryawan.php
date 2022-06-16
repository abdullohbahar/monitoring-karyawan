<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataLaporanPekerjaanKaryawan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Laporan',
            'title' => 'Laporan '
        ];

        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/buat-laporan', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
    }
}
