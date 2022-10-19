<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {
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
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
            $data['spp'] = $this->db->get('spp')->result_array();
            $data['title'] = "SPP";
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('spp/index', $data);
            $this->load->view('layouts/footer');
        } else{
            $this->tambah_spp();
        }

    }

    public function tambah_spp()
    {
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun')),
            'nominal' =>  htmlspecialchars($this->input->post('nominal')),
        ];

        $this->db->insert('spp', $data);
        $this->session->set_flashdata('spp', '<div class="alert alert-success" role="alert">data spp berhasil ditambahkan</div>');
		redirect('admin/spp');
    }

    public function edit_spp()
    {
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun')),
            'nominal' =>  htmlspecialchars($this->input->post('nominal')),
        ];
        $this->db->where('id_spp', $this->input->post('id_spp'));
        $this->db->update('spp', $data);
        $this->session->set_flashdata('spp', '<div class="alert alert-success" role="alert">data spp berhasil diubah</div>');
		redirect('admin/spp');
    }


    public function hapus_spp($id)
    {
        $this->db->where('id_spp', $id);
        $this->db->delete('spp');
        $this->session->set_flashdata('spp', '<div class="alert alert-success" role="alert">data spp berhasil dihapus</div>');
		redirect('admin/spp');
    }


    public function pdf()
    {
        $data['spp'] = $this->db->get('spp')->result_array();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-spp";
		$this->pdf->load_view('spp/pdf', $data);
    }

}