<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        } elseif($this->session->userdata('level') != 'Admin'){
            redirect('auth/blocked');
        }
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['users'] = $this->user->get_all();
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();

        $data['title'] = "Data Murid";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah_murid()
    {
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['title'] = "Login";
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric');
        $this->form_validation->set_rules('nis', 'nis', 'required|trim|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
            $data['title'] = "Tambah Data Murid";
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('user/tambah_murid', $data);
            $this->load->view('layouts/footer');
        } else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'nisn' => htmlspecialchars($this->input->post('nisn')),
                'nis' => htmlspecialchars($this->input->post('nis')),
                'email' => htmlspecialchars($this->input->post('email')),
                'level' => "Murid",
                'photo' => "default.png",
                'id_kelas' => $this->input->post('id_kelas'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_spp' => ""
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('murid', '<div class="alert alert-success" role="alert">Data Murid Berhasil ditambahkan!</div>');
            redirect('admin/user');
        }
    }

    public function edit_murid($id)
    {
        $data['murid'] = $this->user->get_user($id);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['title'] = "Edit Data Murid";
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['title'] = "Edit Data Murid";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('user/edit_murid', $data);
        $this->load->view('layouts/footer');

    }

    public function proses_edit_murid()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'nisn' => htmlspecialchars($this->input->post('nisn')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => 'Murid',
        ];
        if ($this->input->post('password') !== '') {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        $this->session->set_flashdata('murid', '<div class="alert alert-success" role="alert">Data Murid Berhasil diubah!</div>');
        redirect('admin/user');

    }

    public function hapus_murid($id)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        $this->session->set_flashdata('murid', '<div class="alert alert-success" role="alert">Data Murid Berhasil diubah!</div>');
        redirect('admin/user');
    }




    // Admin
    public function petugas()
    {
        $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
        $data['petugas'] = $this->user->get_petugas();

        $data['title'] = "Data Petugas";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('user/petugas', $data);
        $this->load->view('layouts/footer');
    }


    public function tambah_petugas()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'photo' => 'default.png',
            'level' => 'Admin',
        ];

        $this->db->insert('users', $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert">Data Petugas Berhasil ditambahkan!</div>');
        redirect('admin/user/petugas');
    }

    public function edit_petugas()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => 'Admin',
        ];
        if ($this->input->post('password') !== '') {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert">Data Petugas Berhasil diubah!</div>');
        redirect('admin/user/petugas');
    }

    public function hapus_petugas($id)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert">Data Murid Berhasil diubah!</div>');
        redirect('admin/user/petugas');
    }

    public function pdf_murid()
    {
        $data['users'] = $this->user->get_all();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-murid";
		$this->pdf->load_view('user/pdf_murid', $data);
    }

    public function pdf_petugas()
    {
        $data['petugas'] = $this->user->get_petugas();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-petugas";
		$this->pdf->load_view('user/pdf_petugas', $data);
    }


}