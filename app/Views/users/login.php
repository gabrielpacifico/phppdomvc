<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card p-3">
        <div class="card-header bg-secondary text-white">
            <h2>Fazer Login</h2>
        </div>
        <div class="card-body mb-3">
            <?=@Session::mensagem('usuario')?>
            <?=@Session::mensagem('cadastrado')?>
            <p class="card-text"><small class="text-muted">Preencha o formulário para fazer login</small></p>
            <form name="login" method="POST" action="<?=URL?>/usuarios/login">

                <div class="form-group">
                    <label class="form-label mt-3" for="email">Email: <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" 
                    value="<?= $dados['email'] ?>" 
                    class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" 
                    placeholder="E-mail" autocomplete="off">
                    <div class="invalid-feedback"> <?= $dados['email_erro'] ?> </div>
                </div>
                <div class="form-group">
                    <label class="form-label mt-3" for="password">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="password" id="password" 
                    value="<?= $dados['password'] ?>" 
                    class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" 
                    placeholder="Senha" autocomplete="off">
                    <div class="invalid-feedback"> <?= $dados['senha_erro'] ?> </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>

                    <div class="col-md-6">
                        <a href="<?= URL ?>/usuarios/cadastrar">Não tem uma conta? Cadastre-se</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>