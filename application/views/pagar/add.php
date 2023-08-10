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
        
          <form method="POST" name="form_add">

            <fieldset class="mt-4 border p-2 mb-3">
            <legend class="w-auto font-small"><i class="fas fa-info-circle"></i>&nbsp;Informações da conta</legend>

              <div class="form-group row mb-4">
                  <div class="col-md-6">
                    <label>Fornecedor</label>
                      <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                        <option value="" selected></option>
                        <?php foreach($fornecedores as $fornecedor): ?>
                          <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php echo form_error('conta_pagar_fornecedor_id', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Data de vencimento</label>
                    <input type="date" class="form-control form-control-user-date" name="conta_pagar_data_vencimento" value="<?php echo set_value('conta_pagar_data_vencimento') ?>">
                    <?php echo form_error('conta_pagar_data_vencimento', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Valor da conta</label>
                    <input type="text" class="form-control money" name="conta_pagar_valor" placeholder="Valor" value="<?php echo set_value('conta_pagar_valor') ?>">
                    <?php echo form_error('conta_pagar_valor', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>Situação</label>
                      <select class="form-control" name="conta_pagar_status">            
                          <option value="1">Paga</option>
                          <option value="0">Pendente</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row mb-4">
                  <div class="col-md-12">
                    <label>Observações da conta</label>
                    <textarea type="text" class="form-control" name="conta_pagar_obs"><?php echo set_value('conta_pagar_valor') ?></textarea>
                    <?php echo form_error('conta_pagar_obs', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
              </div>
            </fieldset>

            <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()) ?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-save"></i>&nbsp;Salvar</button>
          </form>

        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->