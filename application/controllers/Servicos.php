<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Servicos extends CI_Controller{

    public function __construct() {
        parent::__construct();
 
        if (!$this->ion_auth->logged_in()){
         $this->session->set_flashdata('info', 'Sua sessão expirou!');
         redirect('login');
        }
    }
    
    public function index(){

        $data = array(
            'titulo' => 'Serviços cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'servicos' => $this->ordem_model->get_all('servicos'),
        );

        //echo '<pre>';
        //print_r($data['servicos']);
        //exit();

        $this->load->view('layout/header', $data);
        $this->load->view('servicos/index');
        $this->load->view('layout/footer');

    }

    public function add(){

        $this->form_validation->set_rules('servico_nome', '', 'trim|required|min_length[5]|max_length[145]|is_unique[servicos.servico_nome]');
            $this->form_validation->set_rules('servico_preco', '', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('servico_descricao', '', 'trim|required|max_length[800]');
          

            if($this->form_validation->run()){

                $data = elements(
                    array(
                        'servico_nome',
                        'servico_preco',
                        'servico_descricao',
                        'servico_ativo',
                    ), $this->input->post()
                );
                $data = html_escape($data);

                $this->ordem_model->insert('servicos', $data);
                redirect('servicos');

            } else{
                $data = array(
                    'titulo' => 'Cadastrar serviço',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                );

                $this->load->view('layout/header', $data);
                $this->load->view('servicos/add');
                $this->load->view('layout/footer');
            }
    }

    public function edit($servico_id = null){

        if(!$servico_id || !$this->ordem_model->get_by_id('servicos', array('servico_id' => $servico_id))){
            $this->session->set_flashdata('error', 'Serviço não encontrado');
            redirect('servicos');
        } else{

            $this->form_validation->set_rules('servico_nome', '', 'trim|required|min_length[5]|max_length[145]|callback_check_nome');
            $this->form_validation->set_rules('servico_preco', '', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('servico_descricao', '', 'trim|required|max_length[800]');
          

            if($this->form_validation->run()){

                $data = elements(
                    array(
                        'servico_nome',
                        'servico_preco',
                        'servico_descricao',
                        'servico_ativo',
                    ), $this->input->post()
                );
                $data = html_escape($data);

                $this->ordem_model->update('servicos', $data, array('servico_id' => $servico_id));
                redirect('servicos');

            } else{
                $data = array(
                    'titulo' => 'Atualizar serviço',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'servico' => $this->ordem_model->get_by_id('servicos', array('servico_id' => $servico_id)),
                );

                $this->load->view('layout/header', $data);
                $this->load->view('servicos/edit');
                $this->load->view('layout/footer');
            }

        }

    }

    public function del($servico_id = null){

        if(!$servico_id || !$this->ordem_model->get_by_id('servicos', array('servico_id' => $servico_id))){
            $this->session->set_flashdata('error', 'serviço não encontrado');
            redirect('servicos');
        } else{
            $this->ordem_model->delete('servicos', array('servico_id' => $servico_id));
            redirect('servicos');
        }

     }

    public function check_nome($servico_nome){

        $servico_id = $this->input->post('servico_id');

        if($this->ordem_model->get_by_id('servicos', array('servico_nome' => $servico_nome, 'servido_id !=' => $servico_id))){
            $this->form_validation->set_message('check_nome', 'Esse serviço já existe!');
            return false;
        } else{
            return true;
        }
    }

}