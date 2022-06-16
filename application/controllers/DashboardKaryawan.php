<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardKaryawan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard',
            'title' => 'Dashboard'
        ];
        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/dashboard', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
    }
}
