<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('layouts/auth_footer');
        } else{
            $email = $this->input->post('email');
            //cek email
            $user = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = $user;
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
                redirect('auth');
            }
        }
    }

    public function logout()
	{
        $this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil logout</div>');
		redirect('auth');
	}

    public function blocked()
	{
    	$this->load->view('auth/blocked');
    }
}