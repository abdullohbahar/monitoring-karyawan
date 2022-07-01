<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataJabatan extends CI_Controller
{
    public function index()
    {
        $jabatan = $this->Mjabatan->getAllJabatan()->result_array();
        $data = [
            'active' => 'Data Jabatan',
            'jabatan' => $jabatan,
            'title' => 'Data Jabatan'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/data-jabatan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|is_unique[jabatan.nama_jabatan]');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [
                'nama_jabatan' => $this->input->post('nama_jabatan', true),
            ];

            $this->Mjabatan->savejabatan($data);
            echo json_encode(['success' => 'Data Jabatan Berhasil Ditambahkan.']);
        }
    }

    public function getJabatan()
    {
        $id = $this->uri->segment(3);

        $data = $this->Mjabatan->getJabatanWhere(['idJabatan' => $id])->result();

        echo json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [
                'nama_jabatan' => $this->input->post('nama_jabatan', true),
            ];

            $where = [
                'idJabatan' => $this->input->post('idJabatan')
            ];

            $this->Mjabatan->ubahJabatan($where, $data);

            echo json_encode(['success' => 'Data Jabatan Berhasil Diubah.']);
        }
    }

    public function destroy($id)
    {
        $where = ['idJabatan' => $id];
        $this->Mjabatan->deleteJabatan($where);

        echo json_encode(['success' => 'Data Jabatan Berhasil Dihapus.']);
    }
}
