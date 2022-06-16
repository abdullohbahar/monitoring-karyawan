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

        $this->load->view('template/header', $data);
        $this->load->view('profil/profil', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function ubahPassword()
    {
        $role = $this->session->userdata('role');

        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);

        $data = [
            'password' => $password
        ];

        if ($role == 'karyawan') {

            $where = [
                'idKaryawan' => $this->session->userdata('id')
            ];
            $this->Mkaryawan->ubahPassword($where, $data);
        } else if ($role == 'admin') {

            $where = [
                'idAdmin' => $this->session->userdata('id')
            ];
            $this->Mkaryawan->ubahPasswordAdmin($where, $data);
        } else if ($role == 'superadmin') {

            $where = [
                'idSuperadmin' => $this->session->userdata('id')
            ];
            $this->Mkaryawan->ubahPasswordSuperadmin($where, $data);
        }

        echo json_encode(['success' => 'Password Berhasil Diubah.']);
    }
}
