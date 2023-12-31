<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('formas_pagamentos') ?>">Formas de pagamento</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">    
        
          <form method="POST" name="form_edit">
            <p><strong><i class="fas fa-clock"></i>&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($categoria->categoria_data_alteracao); ?></p>
          
            <fieldset class="mt-4 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-info-circle"></i>&nbsp;Informações</legend>
    
              <div class="form-group row mb-4">
                  <div class="col-md-8">
                    <label>Nome da forma de pagamento</label>
                    <input type="text" class="form-control" name="categoria_nome" placeholder="Nome categoria" value="<?php echo $categoria->categoria_nome; ?>">
                    <?php echo form_error('categoria_nome', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Categoria ativa</label>
                    <select class="form-control" name="categoria_ativa" id="">
                      <option value="0" <?php echo ($categoria->categoria_ativa == 0 ? 'selected' : ''); ?>>Não</option>
                      <option value="1" <?php echo ($categoria->categoria_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                    </select>
                  </div>
              </div> 
            </fieldset>

            <div class="form-group row mb-3">
              <input type="hidden" name="categoria_id" value="<?php echo $categoria->categoria_id; ?>"/>
            </div>

            <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()) ?>" class="btn btn-success btn-sm float-left"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-save"></i>&nbsp;Salvar</button>
          </form>

        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->