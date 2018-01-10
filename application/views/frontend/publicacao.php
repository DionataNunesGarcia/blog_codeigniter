<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- First Blog Post -->
            <h1>
                <?= $postagem->titulo ?>
            </h1>
            <p class="lead">
                por 
                <a href="<?= href('autor', [$postagem->usuario_id , limpar($postagem->nome_usuario)]) ?>">
                    <?= $postagem->nome_usuario ?>
                </a>
            </p>
            <p>
                <span class="glyphicon glyphicon-time"></span> 
                <?= postadoem($postagem->data) ?>
            </p>
            <hr>
            <p>
                <?= $postagem->subtitulo ?>
            </p>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <div class="text-justify">
                <?= $postagem->conteudo ?>
            </div>

            <hr>
        </div>