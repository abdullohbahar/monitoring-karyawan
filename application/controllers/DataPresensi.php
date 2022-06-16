<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPresensi extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'karyawan') {
            redirect('dashboardkaryawan');
        }

        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('karyawan', 'karyawan.idKaryawan = presensi.idKaryawan');
        $query = $this->db->get();
        $presensi = $query->result_array();

        $karyawan = $this->Mkaryawan->getAllKaryawan()->result_array();

        $data = [
            'active' => 'Data Presensi',
            'presensi' => $presensi,
            'title' => 'Data Presensi',
            'karyawan' => $karyawan
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-presensi', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('idKaryawan', 'Nama', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [
                'idKaryawan' => $this->input->post('idKaryawan', true),
                'keterangan' => $this->input->post('keterangan', true),
                'jenis_presensi' => 'Tidak Masuk',
                'tanggal' => $this->input->post('tanggal', true),
                'jam' => "-",
            ];

            $this->Mpresensi->savepresensi($data);
            echo json_encode(['success' => 'Data Presensi Berhasil Ditambahkan.']);
        }
    }

    public function update()
    {
        $data = [
            'keterangan' => $this->input->post('keterangan')
        ];

        $where = [
            'idPresensi' => $this->input->post('id')
        ];

        $this->Mpresensi->ubahPresensi($where, $data);

        echo json_encode(['success' => 'Data Presensi Berhasil Diubah.']);
    }
}
