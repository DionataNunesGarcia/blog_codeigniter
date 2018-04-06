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
                            echo form_open('admin/usuarios/salvar_alteracoes');
                            ?>
                            <input id='id' value="<?php echo $entidade->id; ?>" name='id' type='hidden'>
                            
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id='nome' value="<?php echo $entidade->nome; ?>" name='nome' type='text' class="form-control" placeholder="Digíte o nome">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id='email' value="<?php echo $entidade->email; ?>" name='email' type='email' class="form-control" placeholder="Digíte o email">
                            </div>
                            
                            <div class="form-group">
                                <label for="historico">Histórico</label>
                                <textArea id='historico' name='historico' rows="5" class="form-control" placeholder="Digíte o histórico">
                                    <?php echo $entidade->historico; ?>
                                </textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <input id='usuario' value="<?php echo $entidade->user; ?>" name='usuario' type='text' class="form-control" placeholder="Digíte o usuário">
                            </div>
                            
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input id='senha' name='senha' type='password' class="form-control" placeholder="Digíte a senha">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmar-senha">Confirmar Senha</label>
                                <input id="confirmar-senha" name='confirmar-senha' type='password' class="form-control" placeholder="Digíte a confirmação da senha">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Salvar</button>
                            <?= anchor(base_url('admin/usuarios'), '<i class="fa fa-bars"></i> Listar', ['class' => 'btn btn-default']); ?> 
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