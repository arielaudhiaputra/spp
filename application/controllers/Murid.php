<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
        $this->load->model('Spp_model', 'spp');
    }
    public function index()
    {
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['title'] = "SPPku";
        $data['user'] = $this->spp->get_spp($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('murid/index', $data);
        $this->load->view('layouts/footer');
    }
}