<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= $titulo ?>
                <small> > <?= $subtitulo ?></small>
            </h1>

            <!-- First Blog Post -->
            <?php foreach ($postagens as $item) { ?>
                <h2>
                    <a href="<?php echo href('postagem', [$item->id , limpar($item->titulo)]) ?>">
                        <?= $item->titulo ?>
                    </a>
                </h2>
                <p class="lead">
                    por 
                    <a href="<?= href('autor', [$item->usuario_id , limpar($item->nome_usuario)]) ?>">
                        <?= $item->nome_usuario ?>
                    </a>
                </p>
                <p>
                    <span class="glyphicon glyphicon-time"></span> 
                    <?= postadoem($item->data) ?>
                </p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>
                    <?= $item->subtitulo ?>
                </p>
                <a class="btn btn-primary" href="<?= href('postagem', [$item->id , limpar($item->titulo)]) ?>">
                    Leia mais 
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>

                <hr>
            <?php } ?>


        </div>