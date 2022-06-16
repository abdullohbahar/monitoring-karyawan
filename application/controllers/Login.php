<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan sebelumnya
        if ($this->session->userdata('role') == 'karyawan') {
            redirect('DashboardKaryawan');
        } else if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'superadmin') {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('login/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $karyawan = $this->Mkaryawan->cekKaryawan(['email' => $email])->row_array();
        $admin = $this->Muser->cekUser(['email' => $email], 'admin')->row_array();
        $superadmin = $this->Muser->cekUser(['email' => $email], 'superadmin')->row_array();

        //cek apakah email ada diuser karyawan
        if ($karyawan) {
            //cek apakah password sesuai
            if (password_verify($password, $karyawan['password'])) {
                $data = [
                    'email' => $karyawan['email'],
                    'nama' => $karyawan['nama'],
                    'id' => $karyawan['idKaryawan'],
                    'role' => 'karyawan'
                ];
                $this->session->set_userdata($data);
                redirect('dashboardkaryawan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('login');
            }
            // jika user tidak ditemukan di karyawan maka cek di admin
        } else if ($admin) {
            //cek password
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email' => $admin['email'],
                    'id' => $admin['idAdmin'],
                    'role' => 'admin'
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('login');
            }
        } else if ($superadmin) {
            //cek password
            if (password_verify($password, $superadmin['password'])) {
                $data = [
                    'email' => $superadmin['email'],
                    'id' => $superadmin['idSuperadmin'],
                    'role' => 'superadmin'
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('login');
    }
}
