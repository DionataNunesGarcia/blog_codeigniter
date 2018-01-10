<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= $sobre->nome ?>
            </h1>
            <div class="col-md-8">
                <address>
                    <strong>Endereço: </strong> <?= $sobre->endereco ?>, <?= $sobre->numero ?>
                    <br /> 
                    <strong>Cidade: </strong> <?= $sobre->cidade ?> / <?= $sobre->uf ?>
                    <br /> 
                    <strong title="Phone">Telefone:</strong>  <?= $sobre->telefone ?>
                </address>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive img-circle" src="http://placehold.it/200x200" alt="">                 
            </div>
            <div class="col-md-12"> 
                <p>
                    <?= $sobre->descricao ?>
                </p>

            </div>
            <br>
            <h1 class="page-header">
                Nossos autores
            </h1>
            <div class="col-md-12 row">
                <?php foreach ($usuarios AS $item){ ?>
                    <div class="col-md-4 col-xs-6 text-center">
                        <img class="img-responsive img-circle" src="http://placehold.it/200x200" alt="">
                        <h4 class="text-center">
                            <a href=""><?= $item->nome ?></a>
                        </h4> 
                    </div>
                <?php } ?>
            </div>
        </div>