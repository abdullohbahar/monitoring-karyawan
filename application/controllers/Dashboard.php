<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        $this->load->view('template/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}
