<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Profil',
            'title' => 'Profile'
        ];

        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            $this->load->view('template/header', $data);
            $this->load->view('profil/profil', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        } elseif ($role == 'karyawan') {
            $this->load->view('template-karyawan/header', $data);
            $this->load->view('profil/profil', $data);
            $this->load->view('template-karyawan/sidebar');
            $this->load->view('template-karyawan/footer');
        } elseif ($role == 'superadmin') {
        }
    }

    public function ubahPassword()
    {
        $where = [
            'idKaryawan' => $this->session->userdata('id')
        ];

        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);

        $data = [
            'password' => $password
        ];

        $this->Mkaryawan->ubahPassword($where, $data);

        echo json_encode(['success' => 'Password Berhasil Diubah.']);
    }
}
