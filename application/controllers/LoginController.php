<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function index()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('login/loginn', $data);
        }
        else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->db->get_where('users', ['username' => $username])->row_array();
            

            if($cek){
                if($cek['password'] == $password){
                    if($cek['level'] == 'admin'){
                        redirect('administrator/admin');
                    }
                }
            }
            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User tidak ada</div>');
                redirect('loginController');
            }
        }
        
        
    }
}