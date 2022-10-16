<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        } elseif($this->session->userdata('level') != 'Admin'){
            redirect('auth/blocked');
        }
        $this->load->model('Spp_model', 'spp');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['title'] = "Pembayaran SPP";
        $data['users'] = $this->user->get_all();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah_pembayaran($id)
    {
        $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
        $data['title'] = "Pembayaran SPP";
        $data['bayar'] = $this->spp->get_spp($id);
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['spp'] = $this->db->get('spp')->result_array();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('pembayaran/bayar', $data);
        $this->load->view('layouts/footer');
    }

    public function proses_tambah()
    {
        $data = [
            'id_users' => $this->input->post('id_users'),
            'tgl_bayar' => date('Y-m-d'),
            'bulan_bayar' => htmlspecialchars($this->input->post('bulan_bayar')),
            'id_spp' => $this->input->post('id_spp'),
            'jumlah_bayar' => htmlspecialchars($this->input->post('jumlah_bayar')),
        ];
        $this->db->insert('pembayaran', $data);
        $this->session->set_flashdata('pembayaran', '<div class="alert alert-success" role="alert">Pembayaran berhasil!</div>');
        redirect('admin/pembayaran/tambah_pembayaran/' . $this->input->post('id_users'));
    }

    public function hapus_pembayaran($id)
    {
        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
        $this->session->set_flashdata('pembayaran', '<div class="alert alert-success" role="alert">Pembayaran berhasil dihapus!</div>');
        redirect('admin/pembayaran/tambah_pembayaran/' . $this->input->post('id_users'));
    }

    public function pdf($id)
    {
        $data['users'] = $this->db->get_where('users', ['id' => $id])->row_array();
        $data['bayar'] = $this->spp->get_spp($id);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-pembayaran-spp";
		$this->pdf->load_view('pembayaran/pdf', $data);
    }
}