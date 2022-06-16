<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardKaryawan extends CI_Controller
{
    public function index()
    {
        $id = $this->session->userdata('id');
        $date = date('d-m-Y');
        $cekPresensiMasuk = $this->Mpresensi->getPresensiWhere(['idKaryawan' => $id, 'tanggal' => $date, 'jenis_presensi' => 'masuk'])->row();
        $cekPresensiPulang = $this->Mpresensi->getPresensiWhere(['idKaryawan' => $id, 'tanggal' => $date, 'jenis_presensi' => 'pulang'])->row();

        // var_dump($cekPresensiPulang);
        // die;
        $data = [
            'active' => 'dashboard',
            'title' => 'Dashboard',
            'cekPresensiMasuk' => $cekPresensiMasuk,
            'cekPresensiPulang' => $cekPresensiPulang
        ];


        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/dashboard', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
    }
}
