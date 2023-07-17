<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Clientes extends CI_Controller{

    public function __construct() {
        parent::__construct();
 
        if (!$this->ion_auth->logged_in()){
         $this->session->set_flashdata('info', 'Sua sessão expirou!');
         redirect('login');
     }
     }

     public function index(){

        $data = array(
            'titulo' => 'Clientes cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'clientes' => $this->ordem_model->get_all('clientes'),
        );

        $this->load->view('layout/header', $data);
        $this->load->view('clientes/index');
        $this->load->view('layout/footer');

     }

     public function edit($cliente_id = null){

        if(!$cliente_id || !$this->ordem_model->get_by_id('clientes', array('cliente_id' => $cliente_id))){
            $this->session->set_flashdata('error', 'Cliente não encontrado');
            redirect('clientes');
        } else{

          /*[cliente_id] => 1
            [cliente_data_cadastro] => 2023-07-14 11:49:22
            [cliente_tipo] => 1
            [cliente_nome] => Antonio
            [cliente_sobrenome] => Bueno
            [cliente_data_nascimento] => 2004-08-17
            [cliente_cpf_cnpj] => 05257552094
            [cliente_rg_ie] => 
            [cliente_email] => antoniocbuenas@gmail.com
            [cliente_telefone] => 
            [cliente_celular] => 51997087813
            [cliente_cep] => 
            [cliente_endereco] => 
            [cliente_numero_endereco] => 
            [cliente_bairro] => 
            [cliente_complemento] => 
            [cliente_cidade] => 
            [cliente_estado] => 
            [cliente_ativo] => 0
            [cliente_obs] => */

            $this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_length[4]|max_length[45]');
            $this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_length[4]|max_length[150]');
            $this->form_validation->set_rules('cliente_data_nascimento', '', 'required');
            $this->form_validation->set_rules('cliente_cpf_cnpj', '', 'trim|required|exact_length[18]');
            $this->form_validation->set_rules('cliente_rg_ie', '', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('cliente_email', '', 'trim|required|valid_email|max_length[50]');
            $this->form_validation->set_rules('cliente_telefone', '', 'trim|max_length[14]');
            $this->form_validation->set_rules('cliente_celular', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('cliente_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('cliente_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('cliente_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('cliente_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('cliente_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('cliente_cidade', '', 'trim|required|max_length[80]');
            $this->form_validation->set_rules('cliente_estado', 'UF', 'trim|exact_length[2]');
            $this->form_validation->set_rules('cliente_obs', '', 'max_length[500]');

            if($this->form_validation->run()){
                echo '<pre>';
                print_r($this->input->post());
                exit();
            } else{
                $data = array(
                    'titulo' => 'Atualizar cliente',
                    
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'cliente' => $this->ordem_model->get_by_id('clientes', array('cliente_id' => $cliente_id)),
                );
        
                //echo '<pre>';
                //print_r($data['cliente']);
                //exit();

                $this->load->view('layout/header', $data);
                $this->load->view('clientes/edit');
                $this->load->view('layout/footer');
            }

        }

     }

     
     public function check_email($cliente_email){

        $cliente_email = $this->input->post('cliente_email');

        if($this->ordem_model->get_by_id('clientes', array('cliente_email' => $cliente_email, 'cliente_id !=' => $cliente_id))){
            $this->form_validation->set_message('check_email', 'Esse email já existe');
            return false;
        } else{
            return true;
        }
     }

     public function check_telefone($cliente_telefone){

        $cliente_telefone = $this->input->post('cliente_telefone');

        if($this->ordem_model->get_by_id('clientes', array('cliente_telefone' => $cliente_telefone, 'cliente_id !=' => $cliente_id))){
            $this->form_validation->set_message('check_telefone', 'Esse telefone já existe');
            return false;
        } else{
            return true;
        }
     }

     public function check_celular($cliente_celular){

        $cliente_celular = $this->input->post('cliente_celular');

        if($this->ordem_model->get_by_id('clientes', array('cliente_celular' => $cliente_celular, 'cliente_id !=' => $cliente_id))){
            $this->form_validation->set_message('check_celular', 'Esse celular já existe');
            return false;
        } else{
            return true;
        }
     }

}



?>