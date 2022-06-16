<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkaryawan extends CI_Model
{
    public function savekaryawan($data = null)
    {
        $this->db->insert('karyawan', $data);
    }

    public function getKaryawanWhere($where = null)
    {
        return $this->db->get_where('karyawan', $where);
    }

    public function deleteKaryawan($where)
    {
        return $this->db->delete('karyawan', $where);
    }

    public function getAllKaryawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->get();
    }

    public function cekKaryawan($where = null)
    {
        return $this->db->get_where('karyawan', $where);
    }

    public function ubahKaryawan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('karyawan', $data);
    }

    public function ubahPassword($where, $data)
    {
        $this->db->where($where);
        $this->db->update('karyawan', $data);
    }

    public function ubahPasswordAdmin($where, $data)
    {
        $this->db->where($where);
        $this->db->update('admin', $data);
    }

    public function ubahPasswordSuperadmin($where, $data)
    {
        $this->db->where($where);
        $this->db->update('superadmin', $data);
    }
}
