<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('pagar') ?>">Contas a pagar</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">    
        
          <form method="POST" name="form_edit">
            <p><strong><i class="fas fa-clock"></i>&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($conta_pagar->conta_pagar_data_alteracao); ?></p>
          
            <fieldset class="mt-4 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-info-circle"></i>&nbsp;Informações da conta</legend>

              <div class="form-group row mb-4">
                  <div class="col-md-6">
                    <label>Fornecedor</label>
                      <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                      <option value="" selected></option>
                        <?php foreach($fornecedores as $fornecedor): ?>
                          <option value="<?php echo $fornecedor->fornecedor_id ?>" <?php echo ($fornecedor->fornecedor_id == $conta_pagar->conta_pagar_fornecedor_id ? 'selected' : '') ?>><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php echo form_error('conta_pagar_fornecedor_id', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Data de vencimento</label>
                    <input type="date" class="form-control form-control-user-date" name="conta_pagar_data_vencimento" value="<?php echo $conta_pagar->conta_pagar_data_vencimento; ?>">
                    <?php echo form_error('conta_pagar_data_vencimento', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Valor da conta</label>
                    <input type="text" class="form-control money" name="conta_pagar_valor" value="<?php echo $conta_pagar->conta_pagar_valor; ?>">
                    <?php echo form_error('conta_pagar_valor', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Situação</label>
                      <select class="form-control" name="conta_pagar_status">            
                          <option value="1" <?php echo ($conta_pagar->conta_pagar_status == 1 ? 'selected' : '') ?>>Paga</option>
                          <option value="0" <?php echo ($conta_pagar->conta_pagar_status == 0 ? 'selected' : '') ?>>Pendente</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row mb-4">
                  <div class="col-md-12">
                    <label>Observações da conta</label>
                    <textarea type="text" class="form-control" name="conta_pagar_obs"><?php echo $conta_pagar->conta_pagar_obs; ?></textarea>
                    <?php echo form_error('conta_pagar_obs', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
              </div>
            </fieldset>

            <div class="form-group row mb-3">
              <input type="hidden" name="conta_pagar_id" value="<?php echo $conta_pagar->conta_pagar_id; ?>"/>
            </div>

            <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()) ?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-2" <?php echo ($conta_pagar->conta_pagar_status == 1 ? 'disabled' : '') ?>><i class="fas fa-save"></i>&nbsp;<?php echo ($conta_pagar->conta_pagar_status == 1 ? 'Conta paga' : 'Salvar') ?></button>
          </form>

        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->