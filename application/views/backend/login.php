<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel">
                <?php
                if (!empty($this->session->flashdata('alert'))) {
                    $message = $this->session->flashdata('alert');
                    ?>
                    <div class="alert alert-<?= $message['class'] ?> fade in">
                        <button type="button" class="close btn btn-default" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $message['mensagem']; ?>
                    </div>
                <?php } ?>
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Entrar no sistema</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors('<div class="alert alert-danger">', '</div>');
                        echo form_open('admin/usuarios/login');
                        ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Usuário" name="txt-user" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Senha" name="txt-senha" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block">Entrar</button>
                        </fieldset>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>