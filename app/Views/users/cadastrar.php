<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card p-3">
        <div class="card-header bg-primary bg-gradient text-white">
            <h2>Cadastre-se</h2>
        </div>
        <div class="card-body mb-3">
            <p class="card-text"><small class="text-muted">Preencha o formulário para concluir o cadastro</small></p>
            <form name="cadastrar" method="POST" action="<?=URL?>/usuarios/cadastrar">

                <div class="form-group">
                    <label class="form-label mt-3" for="nome">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" 
                    value="<?= $dados['nome'] ?>" 
                    class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" 
                    placeholder="Nome de usuário" autocomplete="off">
                    <div class="invalid-feedback"> <?= $dados['nome_erro'] ?> </div>
                </div>

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
                <div class="form-group">
                    <label class="form-label mt-3" for="confirm_password">Confimar Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                    value="<?= $dados['confirm_password'] ?>" 
                    class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>" 
                    placeholder="Confirmar senha" autocomplete="off">
                    <div class="invalid-feedback"> <?= $dados['confirma_senha_erro'] ?> </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
                    </div>

                    <div class="col-md-6">
                        <a href="<?= URL ?>/usuarios/login">Já tem uma conta? Fazer login</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>