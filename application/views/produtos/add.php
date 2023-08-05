<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('produtos') ?>">Produtos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">    
        
          <form method="POST" name="form_add">
     
            <fieldset class="mt-4 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-info-circle"></i>&nbsp;Informações gerais</legend>
    
              <div class="form-group row mb-4">
                  <div class="col-md-2">
                    <label>Código produto</label>
                    <input type="text" class="form-control" name="produto_codigo" value="<?php echo $produto_codigo; ?>" readonly>
                  </div>

                  <div class="col-md-2">
                    <label>Código de barras</label>
                    <input type="text" class="form-control" name="produto_codigo_barras" placeholder="Código de barras" value="<?php echo set_value('produto_codigo_barras') ?>">
                    <?php echo form_error('produto_codigo_barras', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
                    
                  <div class="col-md-8">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="produto_descricao" placeholder="Descrição do produto" value="<?php echo set_value('produto_descricao'); ?>">
                    <?php echo form_error('produto_descricao', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
              </div> 

              <div class="form-group row mb-4">
                  <div class="col-md-1">
                    <label>Unidade</label>
                    <input type="text" class="form-control" name="produto_unidade" placeholder="Unidade do produto" value="<?php echo set_value('produto_unidade'); ?>">
                    <?php echo form_error('produto_unidade', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>NCM</label>
                    <input type="text" class="form-control" name="produto_ncm" placeholder="NCM do produto" value="<?php echo set_value('produto_ncm'); ?>">
                    <?php echo form_error('produto_ncm', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-3">
                    <label>Categoria</label>
                      <select class="custom-select" name="produto_categoria_id">
                        <?php foreach($categorias as $categoria): ?>
                          <option value="<?php echo $categoria->categoria_id ?>"><?php echo $categoria->categoria_nome ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="col-md-3">
                    <label>Marca</label>
                      <select class="form-control" name="produto_marca_id">
                        <?php foreach($marcas as $marca): ?>
                          <option value="<?php echo $marca->marca_id ?>"><?php echo $marca->marca_nome ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="col-md-3">
                    <label>Fornecedor</label>
                      <select class="custom-select" name="produto_fornecedor_id">
                        <?php foreach($fornecedores as $fornecedor): ?>
                          <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
              </div>                    
            </fieldset>

            <fieldset class="mt-4 border p-2">
            <legend class="w-auto font-small"><i class="fas fa-funnel-dollar"></i>&nbsp;Precificação e estoque</legend>
    
              <div class="form-group row mb-4">
                  <div class="col-md-3">
                    <label>Preço de custo</label>
                    <input type="text" class="form-control money" name="produto_preco_custo" placeholder="Preço de custo" value="<?php echo set_value('produto_preco_custo'); ?>">
                    <?php echo form_error('produto_preco_custo', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-3">
                    <label>Preço de venda</label>
                    <input type="text" class="form-control money" name="produto_preco_venda" placeholder="Preço de venda" value="<?php echo set_value('produto_preco_venda'); ?>">
                    <?php echo form_error('produto_preco_venda', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
                    
                  <div class="col-md-3">
                    <label>Estoque mínimo</label>
                    <input type="number" class="form-control" name="produto_estoque_minimo" placeholder="Estoque mínimo" value="<?php echo set_value('produto_estoque_minimo'); ?>">
                    <?php echo form_error('produto_estoque_minimo', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-3">
                    <label>Quantidade em estoque</label>
                    <input type="number" class="form-control" name="produto_qtde_estoque" placeholder="Quantidade em estoque" value="<?php echo set_value('produto_qtde_estoque'); ?>">
                    <?php echo form_error('produto_qtde_estoque', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
              </div> 
            </fieldset>

            <fieldset class="mt-4 border mb-3 p-2">
              <legend class="w-auto font-small"><i class="fas fa-cog"></i>&nbsp;Configurações</legend>

                <div class="form-group row mb-4">
                  <div class="col-md-2">
                    <label>Produto ativo</label>
                    <select class="form-control" name="produto_ativo" id="">
                      <option value="0">Não</option>
                      <option value="1">Sim</option>
                    </select>
                  </div>

                  <div class="col-md-10">
                    <label>Observações do produto</label>
                    <textarea type="text" class="form-control" name="produto_obs"><?php echo set_value('produto_obs'); ?></textarea>
                    <?php echo form_error('produto_obs', '<small class="form-text text-danger">','</small>'); ?>
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