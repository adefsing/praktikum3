<?php

//ini adalah class "M_login" berfungsi untuk check data 
class M_login extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
