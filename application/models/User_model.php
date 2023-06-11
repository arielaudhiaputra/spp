<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->join('kelas', 'kelas.id_kelas=users.id_kelas');
        $this->db->join('spp', 'users.id_spp=spp.id_spp');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('level', 'Murid');
        $this->db->join('kelas', 'users.id_kelas=kelas.id_kelas');
        $this->db->join('spp', 'users.id_spp=spp.id_spp');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_petugas()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('level', 'Petugas');
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('kelas', 'users.id_kelas=kelas.id_kelas');
        $this->db->join('spp', 'users.id_spp=spp.id_spp');
        $query = $this->db->get()->result_array();
        return $query;
    }
}