<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Pagar extends CI_Controller{

    public function __construct() {
        parent::__construct();
 
        if (!$this->ion_auth->logged_in()){
         $this->session->set_flashdata('info', 'Sua sessão expirou!');
         redirect('login');
        }
        $this->load->model('financeiro_model');
    }
    
    public function index(){

        $data = array(
            'titulo' => 'Contas a pagar cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'contas_pagar' => $this->financeiro_model->get_all_pagar(),
        );

        //echo '<pre>';
        //print_r($data['contas_pagar']);
        //exit();

        $this->load->view('layout/header', $data);
        $this->load->view('pagar/index');
        $this->load->view('layout/footer');

    }

    public function edit($conta_pagar_id = null){

        if(!$conta_pagar_id || !$this->ordem_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))){
            $this->session->set_flashdata('error', 'Conta não encontrada');
            redirect('pagar');
        } else{

            $this->form_validation->set_rules('conta_pagar_fornecedor_id', '', 'required');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', '', 'required');
            $this->form_validation->set_rules('conta_pagar_valor', '', 'required');
            $this->form_validation->set_rules('conta_pagar_obs', '', 'max_length[100]');

            if($this->form_validation->run()){
                $data = elements(
                    array(
                        'conta_pagar_fornecedor_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()
                );

                $conta_pagar_status = $this->input->post('conta_pagar_status');
                if($conta_pagar_status == 1){
                    $data['conta_pagar_data_pagamento'] = date('Y-m-d h:i:s');
                }
                $data = html_escape($data);
                $this->ordem_model->update('contas_pagar', $data, array('conta_pagar_id' => $conta_pagar_id));
                redirect('pagar');

            } else{
                $data = array(
                    'titulo' => 'Atualizar conta',
                    'styles' => array(
                        'vendor/datatables/dataTables.bootstrap4.min.css',
                        'vendor/select2/select2.min.css',
                    ),
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                        'vendor/select2/select2.min.js',
                        'vendor/select2/custom.js',
                    ),
                    'conta_pagar' => $this->ordem_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)),
                    'fornecedores' => $this->ordem_model->get_all('fornecedores'),
                );
        
                //echo '<pre>';
                //print_r($data['contas_pagar']);
                //exit();
        
                $this->load->view('layout/header', $data);
                $this->load->view('pagar/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function add(){

            $this->form_validation->set_rules('conta_pagar_fornecedor_id', '', 'required');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', '', 'required');
            $this->form_validation->set_rules('conta_pagar_valor', '', 'required');
            $this->form_validation->set_rules('conta_pagar_obs', '', 'max_length[100]');

            if($this->form_validation->run()){
                $data = elements(
                    array(
                        'conta_pagar_fornecedor_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()
                );

                $conta_pagar_status = $this->input->post('conta_pagar_status');
                if($conta_pagar_status == 1){
                    $data['conta_pagar_data_pagamento'] = date('Y-m-d h:i:s');
                }
                $data = html_escape($data);
                $this->ordem_model->insert('contas_pagar', $data);
                redirect('pagar');

            } else{
                $data = array(
                    'titulo' => 'Adicionar conta',
                    'styles' => array(
                        'vendor/datatables/dataTables.bootstrap4.min.css',
                        'vendor/select2/select2.min.css',
                    ),
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                        'vendor/select2/select2.min.js',
                        'vendor/select2/custom.js',
                    ),
                    'fornecedores' => $this->ordem_model->get_all('fornecedores'),
                );
        
                $this->load->view('layout/header', $data);
                $this->load->view('pagar/add');
                $this->load->view('layout/footer');
            }

    }

    public function del($conta_pagar_id = null){

        if(!$conta_pagar_id || !$this->ordem_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))){
            $this->session->set_flashdata('error', 'Conta não encontrada');
            redirect('pagar');
        }

        if($this->ordem_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id, 'conta_pagar_status' => 0))){
            $this->session->set_flashdata('info', 'Esta conta não pode ser excluída, pois ainda está em aberto');
            redirect('pagar');
        }

        $this->ordem_model->delete('contas_pagar', array('conta_pagar_id' => $conta_pagar_id));
        redirect('pagar');
    }

}