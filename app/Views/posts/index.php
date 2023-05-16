<div class="container card text-center p-0 mt-5 mb-5">
  <?= @Session::mensagem('post') ?>
  <div class="card-header bg-dark text-white">
    Postagens
  </div>
  <div class="card-body" style="background: #c2c2c2;">
    <h5 class="card-title">Postagens da página</h5>
    <p class="card-text">Clique no botão para começar a postar.</p>
    <a href="<?= URL ?>/posts/cadastrar" class="btn btn-primary">Começar a postar</a>
  </div>
  <div class="card-body">

    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Escrito por</th>
          <th scope="col">Título</th>
          <th scope="col">Texto</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dados['posts'] as $post) { ?>
        <tr onclick="location.href='<?=URL.'/posts/ver/'.$post->postid ?>'" style="cursor: pointer;">
          <td><?= $post->nome ?></td>
          <td><?= $post->titulo ?></td>
          <td><?= $post->texto ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

  </div>
</div>