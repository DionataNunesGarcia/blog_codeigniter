<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $titulo ?> - <?= $subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= 'Alterar ' . $titulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/categoria/salvar_alteracoes');
                            ?>
                            <input id='id' value="<?php echo $categoria->id; ?>" name='id' type='hidden'>
                            <div class="form-group">
                                <label for="titulo">Nome</label>
                                <input id='titulo' value="<?php echo $categoria->titulo; ?>" name='titulo' type='text' class="form-control" placeholder="Digíte o nome da Categoria">
                            </div>
                            <button type="submit" class="btn btn-default">Salvar</button>
                            <?= anchor(base_url('admin/categoria'), '<i class="fa fa-bars"></i> Listar', ['class' => 'btn btn-default']); ?> 
                            <?php
                            echo form_close();
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