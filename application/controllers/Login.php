<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller{
    
    public function index(){

        $data = array(
            'titulo' => 'login',

        );
 
            $this->load->view('layout/header');
            $this->load->view('login/index');
            $this->load->view('layout/footer');
    }

    public function auth(){

        $identity = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = false; 
        
        if($this->ion_auth->login($identity, $password, $remember)){
            redirect('home');
        } else{
            $this->session->set_flashdata('error', 'Verifique seu email ou senha');
            redirect('login');
        }

        

    }

    public function logout(){

        $this->ion_auth->logout();
        redirect('login');
    }















}










?>