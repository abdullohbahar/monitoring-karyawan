<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mjabatan extends CI_Model
{
    public function savejabatan($data = null)
    {
        $this->db->insert('jabatan', $data);
    }

    public function getJabatanWhere($where = null)
    {
        return $this->db->get_where('jabatan', $where);
    }

    public function deleteJabatan($where)
    {
        return $this->db->delete('jabatan', $where);
    }

    public function getAllJabatan()
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        return $this->db->get();
    }

    public function cekJabatan($where = null)
    {
        return $this->db->get_where('jabatan', $where);
    }

    public function ubahJabatan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('jabatan', $data);
    }

    public function ubahPassword($where, $data)
    {
        $this->db->where($where);
        $this->db->update('jabatan', $data);
    }
}
