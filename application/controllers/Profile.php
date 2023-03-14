<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
        $this->load->model('User_model', 'user');
    }
    public function index()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim');
        $this->form_validation->set_rules('nisn', 'NISN', 'trim');
        $this->form_validation->set_rules('no_telp', 'No.TELP', 'trim');
        $this->form_validation->set_rules('nis', 'NIS', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->user->get_user($this->session->userdata('id'));
            $data['profile'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $data['title'] = "Profile";
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('profile', $data);
            $this->load->view('layouts/footer');
        } else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'id_kelas' => $this->input->post('id_kelas'),
                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            if ($this->input->post('password') !== '') {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('users', $data);
            $this->session->set_flashdata('profile', '<div class="alert alert-success" role="alert">data profile berhasil diupdate</div>');
            redirect('profile');
        }
    }


    public function update_photo()
    {
        $data['users'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();


		$upload_photo = $_FILES['photo']['name'];

        if ($upload_photo) {
            $config['allowed_types'] = 'gif|jpg|png|jepg|pdf|svg';
            $config['max_size']      = '4048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $old_photo = $data['users']['photo'];
                if ($old_photo != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_photo);
                }
                $new_photo = $this->upload->data('file_name');
                $this->db->set('photo', $new_photo);
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('users');
                $this->session->set_flashdata('profile', '<div class="alert alert-success" role="alert">Foto profile telah diupdate</div>');
                redirect('profile');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function hapus_photo()
    {

        $this->db->where('id', $this->input->post('id'));
        $this->db->set('photo', $this->input->post('photo'));
        $this->db->update('users');
        $this->session->set_flashdata('profile', '<div class="alert alert-success" role="alert">Foto profile berhasil dihapus</div>');
        redirect('profile');
    }
}