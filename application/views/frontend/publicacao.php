<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- First Blog Post -->
            <?php foreach ($postagens as $item) { ?>
                <h1>
                    <?= $item->titulo ?>
                </h1>
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
                <p>
                    <?= $item->subtitulo ?>
                </p>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <div class="text-justify">
                    <?= $item->conteudo ?>
                </div>

                <hr>
            <?php } ?>


        </div>