<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        if (logged_in()) {
            redirect('home');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    // public function proseslogin()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $user = $this->Admin_model->login($username,$password);

    //     if ($user) {
    //         if ('id_role' == '1')
    //         {
    //             $data = [
    //             'username' => $username
    //             ];
    //         }
    //         else 
    //         {
    //             $data = [
    //             'username' => $username
    //             ];
    //         }
    //         $this->session->set_userdata($user);
    //         redirect('provinsi/index');
    //     } 

    //     else {
    //         // $this->session->set_flashdata('message1', '<small class="text-danger">Email belum diaktivasi</small>');
    //         redirect('auth');
    //         // var_dump($username);
    //     }
    
    
    // }

    public function proseslogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->Admin_model->login($username, $password);
        
        if ($user) {
                if ($user['id_role'] == '1')
                {
                    $data = [
                    'username' => $username, 
                    'id_role' => $user['id_role']
                    ];
                }
                else 
                {
                    $data = [
                    'username' => $username,
                    'id_role' => $user['id_role']
                    ];
                }
                $this->session->set_userdata($user);

                if($user["id_provinsi"] !== null){
                    redirect('daerah/index/'.$user["id_provinsi"]);
                } else {
                    redirect('provinsi/index');
                }
                

            } else {
                // $this->session->set_flashdata('message1', '<small class="text-danger">Email belum diaktivasi</small>');
                redirect('auth');
            }
        
        
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('auth');
    }
}
