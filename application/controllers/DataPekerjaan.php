<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPekerjaan extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'Data Pekerjaan'
        ];

        $this->load->view('template/header');
        $this->load->view('admin/data-pekerjaan', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
