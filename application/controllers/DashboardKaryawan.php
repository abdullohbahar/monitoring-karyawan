<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardKaryawan extends CI_Controller
{
    public function index()
    {
        $id = $this->session->userdata('idKaryawan');
        $date = date('d-m-Y');
        $cekPresensiMasuk = $this->Mpresensi->getPresensiWhere(['tanggal' => $date, 'idKaryawan' => $id, 'jenis_presensi' => 'masuk'])->row();

        $data = [
            'active' => 'dashboard',
            'title' => 'Dashboard',
            'cekPresensiMasuk' => $cekPresensiMasuk
        ];


        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/dashboard', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
    }
}
