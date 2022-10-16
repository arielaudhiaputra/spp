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
}