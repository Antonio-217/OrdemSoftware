<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('marcas') ?>">Marcas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">    
        
          <form method="POST" name="form_add">
          
            <fieldset class="mt-4 mb-3 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-info-circle"></i>&nbsp;Informações</legend>
    
              <div class="form-group row mb-4">
                  <div class="col-md-8">
                    <label>Nome da marca</label>
                    <input type="text" class="form-control" name="marca_nome" placeholder="Nome marca" value="<?php echo set_value('marca_nome') ?>">
                    <?php echo form_error('marca_nome', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Marca ativa</label>
                    <select class="form-control" name="marca_ativa" id="">
                      <option value="0">Não</option>
                      <option value="1">Sim</option>
                    </select>
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