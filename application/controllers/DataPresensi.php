<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{
    public function index()
    {
        $presensi = $this->Mpresensi->getAllPresensi()->result_array();

        $data = [
            'active' => 'Data Presensi',
            'presensi' => $presensi,
            'title' => 'Data Presensi'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-presensi', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function presensiMasuk()
    {
        $jam = date("H:i:s");

        if ($jam > "09:00:59") {
            $keterangan = "Terlambat";
        } else {
            $keterangan = "Tepat Waktu";
        }

        $data = [
            'idKaryawan' => $this->session->userdata('idKaryawan'),
            'keterangan' => $keterangan,
            'jenis_presensi' => 'Masuk',
            'tanggal' => date("d-m-Y"),
            'jam' => date("H:i:s"),
        ];

        $this->Mpresensi->savepresensi($data);

        echo json_encode(['success' => 'Anda Berhasil Presensi Pada Pukul ' . $jam . '.']);
    }
}
