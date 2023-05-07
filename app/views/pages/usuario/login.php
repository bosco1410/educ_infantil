<div class="container my-4">
    <form action="<?=URL?>/login/login" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Login do usuário</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control <?=$dados['email_error'] ? 'is-invalid' : ''?>" id="email" name="email" value="<?= $dados['email'] ?>">
                    <div class="invalid-feedback"><?= $dados['email_error'] ?></div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control <?=$dados['senha_error'] ? 'is-invalid' : ''?>" id="senha" name="senha">
                    <div class="invalid-feedback"><?= $dados['senha_error'] ?></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</div>