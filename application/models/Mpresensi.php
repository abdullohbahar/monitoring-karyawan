<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpresensi extends CI_Model
{
    public function savepresensi($data = null)
    {
        $this->db->insert('presensi', $data);
    }

    public function getPresensiWhere($where = null)
    {
        return $this->db->get_where('presensi', $where);
    }

    public function getAllPresensi()
    {
        $this->db->select('*');
        $this->db->from('presensi');
        return $this->db->get();
    }
}
