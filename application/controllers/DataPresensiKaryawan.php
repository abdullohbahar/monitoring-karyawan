<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensiKaryawan extends CI_Controller
{
    public function index()
    {
        $id = $this->session->userdata('id');
        $presensi = $this->Mpresensi->getPresensiWhere(['idKaryawan' => $id])->result_array();

        $data = [
            'active' => 'Data Presensi',
            'presensi' => $presensi,
            'title' => 'Data Presensi'
        ];

        $this->load->view('template-karyawan/header', $data);
        $this->load->view('karyawan/data-presensi', $data);
        $this->load->view('template-karyawan/sidebar');
        $this->load->view('template-karyawan/footer');
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
            'idKaryawan' => $this->session->userdata('id'),
            'keterangan' => $keterangan,
            'jenis_presensi' => 'Masuk',
            'tanggal' => date("Y-m-d"),
            'jam' => date("H:i:s"),
        ];

        $this->Mpresensi->savepresensi($data);

        echo json_encode(['success' => 'Anda Berhasil Absen Masuk Pada Pukul ' . $jam . '.']);
    }

    public function presensiPulang()
    {
        $jam = date("H:i:s");

        $data = [
            'idKaryawan' => $this->session->userdata('id'),
            'keterangan' => 'Pulang',
            'jenis_presensi' => 'Pulang',
            'tanggal' => date("Y-m-d"),
            'jam' => date("H:i:s"),
        ];

        $this->Mpresensi->savepresensi($data);

        echo json_encode(['success' => 'Anda Berhasil Absen Pulang Pada Pukul ' . $jam . '.']);
    }
}
