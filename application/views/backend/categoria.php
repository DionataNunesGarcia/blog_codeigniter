<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $titulo ?> - <?= $subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= 'Pesqusar ' . $titulo ?> <?= anchor(base_url('admin/categoria/incluir'), '<i class="fa fa-plus-circle"></i> Novo', ['class' => 'btn btn-default']); ?> 
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $this->table->set_heading("Nome Categoria", "Alterar", "Excluir");
                            foreach ($categorias AS $categoria) {
                            
                                $alterar = anchor(base_url('admin/categoria/alterar/'. md5($categoria->id)), '<i class="fa fa-edit fa-fw"></i> Editar', ['class' => 'btn btn-primary btn-xs']);
                                $excluir = anchor(base_url('admin/categoria/excluir/'. md5($categoria->id)), '<i class="fa fa-trash fa-fw"></i> Excluir', ['class' => 'btn btn-danger btn-xs']);

                                $this->table->add_row($categoria->titulo, $alterar, $excluir);
                            }
                            $this->table->set_template(array(
                                'table_open' => '<table class="table table-striped">'
                            ));

                            echo $this->table->generate();
                            ?> 
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!--
<form role="form">
    <div class="form-group">
        <label>Titulo</label>
        <input class="form-control" placeholder="Entre com o texto">
    </div>
    <div class="form-group">
        <label>Foto Destaque</label>
        <input type="file">
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label>Selects</label>
        <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Cadastrar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
</form>-->