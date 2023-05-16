<nav class="navbar navbar-expand-lg p-3" data-bs-theme="dark" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="<?= URL ?>"> Projeto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
        </li>

      </ul>
      <span class="navbar-text">
        <?php if (isset($_SESSION['id'])) { ?>
          <small id="session"> Seja bem-vindo | <?= $_SESSION['nome'] ?> </small>
          <a href="<?= URL ?>/usuarios/logout" id="btn-logout">Logout</a>
        <?php } else { ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" id="btn-header" href="<?= URL ?>/usuarios/cadastrar">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="btn-header" href="<?= URL ?>/usuarios/login">Login</a>
            </li>
          </ul>
        <?php } ?>
      </span>
    </div>
  </div>
</nav>