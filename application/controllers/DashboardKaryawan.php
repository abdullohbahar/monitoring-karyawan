<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardKaryawan extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'superadmin') {
            redirect('dashboard');
        }

        $id = $this->session->userdata('id');
        $date = date('Y-m-d');
        $cekPresensiMasuk = $this->Mpresensi->getPresensiWhere(['idKaryawan' => $id, 'tanggal' => $date, 'jenis_presensi' => 'masuk'])->row();
        $cekPresensiPulang = $this->Mpresensi->getPresensiWhere(['idKaryawan' => $id, 'tanggal' => $date, 'jenis_presensi' => 'pulang'])->row();

        // var_dump($cekPresensiMasuk);
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
