<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{
    public function saveadmin($data = null)
    {
        $this->db->insert('admin', $data);
    }

    public function getAdminWhere($where = null)
    {
        return $this->db->get_where('admin', $where);
    }

    public function deleteAdmin($where)
    {
        return $this->db->delete('admin', $where);
    }

    public function getAllAdmin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get();
    }

    public function cekAdmin($where = null)
    {
        return $this->db->get_where('admin', $where);
    }

    public function ubahAdmin($where, $data)
    {
        $this->db->where($where);
        $this->db->update('admin', $data);
    }

    public function ubahPassword($where, $data)
    {
        $this->db->where($where);
        $this->db->update('admin', $data);
    }
}
