<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function get_transaksi_user($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_users', $id);
        $this->db->join('users', 'users.id=transaksi.id_users');
        $this->db->join('spp', 'spp.id_spp=transaksi.id_spp');
        $this->db->order_by('transaction_time');
        $query = $this->db->get_where()->result_array();
        return $query;
    }


}