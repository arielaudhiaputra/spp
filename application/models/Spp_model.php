<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp_model extends CI_Model
{
    public function get_spp($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('id_users', $id);
        $this->db->join('users', 'users.id=pembayaran.id_users');
        $this->db->join('spp', 'spp.id_spp=pembayaran.id_spp');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_total($id)
    {
        $this->db->select('id_pembayaran, id_users, tgl_bayar, bulan_bayar, id_spp, SUM(jumlah_bayar) as jumlah_bayar');
        $this->db->from('pembayaran');
        $this->db->where('id_users', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
}