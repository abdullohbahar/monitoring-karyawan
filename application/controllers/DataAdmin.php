<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataAdmin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'karyawan') {
            redirect('dashboardkaryawan');
        } else if ($this->session->userdata('role') == 'admin') {
            redirect('dashboard');
        }

        $admin = $this->Madmin->getAllAdmin()->result_array();
        $data = [
            'active' => 'Data Admin',
            'admin' => $admin,
            'title' => 'Data Admin'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-admin', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]|is_unique[admin.email]|is_unique[superadmin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            ];

            $this->Madmin->saveAdmin($data);
            echo json_encode(['success' => 'Data Admin Berhasil Ditambahkan.']);
        }
    }

    public function getAdmin()
    {
        $id = $this->uri->segment(3);

        $data = $this->Madmin->getAdminWhere(['idAdmin' => $id])->result();

        echo json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function update()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            if ($this->input->post('password') == null) {
                $data = [
                    'email' => $this->input->post('email', true),
                ];
            } else {
                $data = [
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                ];
            }

            $where = [
                'idAdmin' => $this->input->post('idAdmin')
            ];

            $this->Madmin->ubahAdmin($where, $data);
            echo json_encode(['success' => 'Data Admin Berhasil Diubah.']);
        }
    }

    public function destroy($id)
    {
        $where = ['idAdmin' => $id];
        $this->Madmin->deleteAdmin($where);

        echo json_encode(['success' => 'Data Admin Berhasil Dihapus.']);
    }
}
