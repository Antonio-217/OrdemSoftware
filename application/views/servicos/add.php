<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('servicos') ?>">serviços</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">    
        
          <form method="POST" name="form_add">
           
            <fieldset class="mt-4 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-concierge-bell"></i>&nbsp;Informações</legend>
    
              <div class="form-group row mb-4">
                  <div class="col-md-6">
                    <label>Nome do serviço</label>
                    <input type="text" class="form-control" name="servico_nome" placeholder="Nome serviço" value="<?php echo set_value('servico_nome') ?>">
                    <?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
                    
                  <div class="col-md-3">
                    <label>Preço do serviço</label>
                    <input type="text" class="form-control money" name="servico_preco" placeholder="Preço serviço" value="<?php echo set_value('servico_preco') ?>">
                    <?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-3">
                    <label>Serviço ativo</label>
                    <select class="form-control" name="servico_ativo" id="">
                      <option value="0">Não</option>
                      <option value="1">Sim</option>
                    </select>
                  </div>
              </div> 
              
              <div class="form-group row mb-4">
                  <div class="col-md-12">
                    <label>Descrição do serviço</label>
                    <textarea type="text" class="form-control" rows="8" name="servico_descricao"><?php echo set_value('servico_descricao') ?></textarea>
                    <?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>'); ?>
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