<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKaryawan extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'karyawan') {
            redirect('dashboardkaryawan');
        }

        $jabatan = $this->Mjabatan->getAllJabatan()->result_array();

        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->join('karyawan', 'karyawan.idJabatan = jabatan.idJabatan');
        $karyawan = $this->db->get()->result_array();
        $data = [
            'active' => 'Data Karyawan',
            'karyawan' => $karyawan,
            'jabatan' => $jabatan,
            'title' => 'Data Karyawan'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-karyawan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]|is_unique[admin.email]|is_unique[superadmin.email]');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|is_unique[karyawan.no_hp]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'idAdmin' => $this->session->userdata('id'),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'no_hp' => $this->input->post('no_hp', true),
                'idJabatan' => $this->input->post('jabatan', true),
                'nik' => $this->input->post('nik', true),
                'status' => $this->input->post('status', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            ];

            $this->Mkaryawan->saveKaryawan($data);
            echo json_encode(['success' => 'Data Karyawan Berhasil Ditambahkan.']);
        }
    }

    public function getKaryawan()
    {
        $id = $this->uri->segment(3);

        $data = $this->Mkaryawan->getKaryawanWhere(['idKaryawan' => $id])->result();

        echo json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            if ($this->input->post('password') == null) {
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'alamat' => $this->input->post('alamat', true),
                    'email' => $this->input->post('email', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'idJabatan' => $this->input->post('jabatan', true),
                    'nik' => $this->input->post('nik', true),
                    'status' => $this->input->post('status', true),
                ];
            } else {
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'alamat' => $this->input->post('alamat', true),
                    'email' => $this->input->post('email', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'idJabatan' => $this->input->post('jabatan', true),
                    'nik' => $this->input->post('nik', true),
                    'status' => $this->input->post('status', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                ];
            }

            $where = [
                'idKaryawan' => $this->input->post('idKaryawan')
            ];

            $this->Mkaryawan->ubahKaryawan($where, $data);
            echo json_encode(['success' => 'Data Karyawan Berhasil Diubah.']);
        }
    }

    public function destroy($id)
    {
        $where = ['idKaryawan' => $id];
        $this->Mkaryawan->deleteKaryawan($where);

        echo json_encode(['success' => 'Data Karyawan Berhasil Dihapus.']);
    }
}
