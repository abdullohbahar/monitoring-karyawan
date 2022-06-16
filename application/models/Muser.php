<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    public function cekUser($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
