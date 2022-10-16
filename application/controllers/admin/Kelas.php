<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        } elseif($this->session->userdata('level') != 'Admin'){
            redirect('auth/blocked');
        }

    }

    public function index()
    {
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['title'] = "Kelas";
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah_kelas()
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas'))
        ];
        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('kelas', '<div class="alert alert-success" role="alert">Data kelas berhasil ditambahkan!</div>');
        redirect('admin/kelas');
    }

    public function edit_kelas()
    {
        $data = $this->input->post('nama_kelas');
        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->set('nama_kelas', $data);
        $this->db->update('kelas');
        $this->session->set_flashdata('kelas', '<div class="alert alert-success" role="alert">Data kelas berhasil diubah!</div>');
        redirect('kelas');
    }

    public function hapus_kelas($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('kelas');
        $this->session->set_flashdata('kelas', '<div class="alert alert-success" role="alert">Data kelas berhasil dihapus!</div>');
        redirect('admin/kelas');
    }

    public function pdf()
    {
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-kelas";
		$this->pdf->load_view('kelas/pdf', $data);
    }
}