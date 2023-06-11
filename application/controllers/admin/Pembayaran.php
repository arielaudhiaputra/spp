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
        $data['users'] = $this->user->get_data();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah_pembayaran($id)
    {
        $user_id = $this->db->get_where('users', ['id' => $id])->row_array();
        $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
        $data['title'] = "Pembayaran SPP";
        $data['bayar'] = $this->spp->get_spp($id);
        $data['nominal'] = $this->db->get_where('spp', ['id_spp' => $user_id['id_spp']])->row_array();
        $data['total'] = $this->spp->get_total($id);
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
        $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required|trim|numeric');
        $this->form_validation->set_rules('bulan_bayar', 'Bulan Bayar', 'required|trim');

        if ($this->form_validation->run() == true) {
            $user_id = $this->db->get_where('users', ['id' => $this->input->post('id_users')])->row_array();
            $spp = $this->db->get_where('spp', ['id_spp' => $user_id['id_spp']])->row_array();
            $data = [
                'id_users' => $this->input->post('id_users'),
                'tgl_bayar' => date('Y-m-d'),
                'bulan_bayar' => htmlspecialchars($this->input->post('bulan_bayar')),
                'id_spp' => $spp['id_spp'],
                'jumlah_bayar' => $this->input->post('jumlah_bayar'),
            ];

            $total = $this->spp->get_total($this->input->post('id_users'));
            $jumlah = $spp['nominal'] - $total['jumlah_bayar'];

            if ($this->input->post('jumlah_bayar') > $jumlah ) {
                $this->session->set_flashdata('pembayaran', '<div class="alert alert-danger" role="alert">Pembayaran gagal!</div>');
                redirect('admin/pembayaran/tambah_pembayaran/' . $this->input->post('id_users'));
            }elseif ($this->input->post('jumlah_bayar') <= 0) {
                $this->session->set_flashdata('pembayaran', '<div class="alert alert-danger" role="alert">Pembayaran gagal!</div>');
                redirect('admin/pembayaran/tambah_pembayaran/' . $this->input->post('id_users'));
            }else{
                $this->db->insert('pembayaran', $data);
                $this->session->set_flashdata('pembayaran', '<div class="alert alert-success" role="alert">Pembayaran berhasil!</div>');
                if ($jumlah -  $this->input->post('jumlah_bayar') == 0) {
                    $data = [
                        'status' => "lunas"
                    ];

                    $this->db->where('id', $this->input->post('id_users'));
                    $this->db->update('users', $data);
                }
                redirect('petugas/pembayaran/tambah_pembayaran/' . $this->input->post('id_users'));
            }
        } else{
            $id = $this->input->post('id_users');
            $this->tambah_pembayaran($id);
        }

    }

    public function hapus_pembayaran($id)
    {
        $id_pembayaran = $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row_array();
        $id_murid = $id_pembayaran['id_users'];
        $data = [
            'status' => "belum lunas"
        ];

        $this->db->where('id', $id_murid);
        $this->db->update('users', $data);

        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
        $this->session->set_flashdata('pembayaran', '<div class="alert alert-success" role="alert">Pembayaran berhasil dihapus!</div>');
        redirect('admin/pembayaran/tambah_pembayaran/'. $id_murid);
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