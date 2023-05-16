<div class="col-md-8 mx-auto p-5">

<nav aria-label="breadcrumb" id="breadcrumb">
  <ol class="breadcrumb p-2">
    <li class="breadcrumb-item"><a href="<?=URL?>/posts">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
  </ol>
</nav>

    <div class="card" style="background: #e2e2e2;">
        <div class="card-header bg-secondary text-white">
            <h4>Escrever Post</h4>
        </div>
        <div class="card-body mb-3">
            <?= @Session::mensagem('usuario') ?>
            <?= @Session::mensagem('cadastrado') ?>
            <form name="login" method="POST" action="<?= URL ?>/posts/cadastrar">

                <div class="form-group">
                    <label class="form-label mt-3" for="titulo">Título: <sup class="text-danger">*</sup></label>
                    <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>" placeholder="Título do post" autocomplete="off">
                    <div class="invalid-feedback"> <?= $dados['titulo_erro'] ?> </div>
                </div>
                <div class="form-group">
                    <label class="form-label mt-3" for="texto">Texto: <sup class="text-danger">*</sup></label>
                    <textarea name="texto" id="texto" class="form-control <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" placeholder="Texto do post" autocomplete="off"><?= $dados['texto']; ?></textarea>
                    <div class="invalid-feedback"> <?= $dados['texto_erro'] ?> </div>
                </div>

                <input type="submit" value="Postar" class="btn btn-info btn-block mt-4">
        </div>
        </form>
    </div>
</div>