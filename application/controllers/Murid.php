<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        } elseif($this->session->userdata('level') != 'Murid'){
            redirect('auth/blocked');
        }
        $this->load->model('Spp_model', 'spp');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $jumlah = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['nominal'] = $this->db->get_where('spp', ['id_spp' => $jumlah['id_spp']])->row_array();
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['title'] = "SPPku";
        $data['user'] = $this->spp->get_spp($id);

        $data['spp'] = $this->spp->get_total($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('murid/index', $data);
        $this->load->view('layouts/footer');
    }

}