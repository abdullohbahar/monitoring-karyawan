<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'karyawan') {
            redirect('dashboardkaryawan');
        }

        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->where(['tanggal' => date('Y-m-d')]);
        $this->db->join('karyawan', 'karyawan.idKaryawan = presensi.idKaryawan');
        $query = $this->db->get();
        $presensi = $query->result_array();

        $data = [
            'active' => 'dashboard',
            'title' => 'Dashboard',
            'presensi' => $presensi
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
