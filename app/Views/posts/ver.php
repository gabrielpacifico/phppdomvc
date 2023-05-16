<div class="container my-5">

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb p-2">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->titulo ?></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <?= $dados['post']->titulo ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p> <?= $dados['post']->texto ?> </p>
                <footer class="blockquote-footer mt-3">Escrito por: <strong><?= $dados['usuario']->nome?></strong></footer>
            </blockquote>
            <?php if($dados['post']->usuario_id == $_SESSION['id']){ ?>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="<?= URL.'/posts/editar/'.$dados['post']->id ?>" class="btn btn-primary mt-3">Editar</a>
                    </li>
                    <li class="list-inline-item">
                        <form action="<?= URL. '/posts/excluir/' . $dados['post']->id ?>" method="POST">
                            <input type="submit" class="btn btn-danger mt-3" value="Excluir">
                        </form>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>

</div>