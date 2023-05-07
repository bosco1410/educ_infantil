<div class="container my-3">
    <h2>Editar usuário</h2>
    <form action="<?=URL . '/usuarios/editar/' .$dados['id']?>" method="post">

        <div class="row">
            <div class="col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control <?=$dados['nome_error'] ? 'is-invalid' : '' ?>" name="nome" id="nome" value="<?=$dados['nome']?>">
                <div class="invalid-feedback"><?=$dados['nome_error']?></div>
            </div>
            <div class="col-md-6">
                <label for="email">E-mail</label>
                <input type="text" class="form-control <?=$dados['email_error'] ? 'is-invalid' : '' ?>" name="email" id="email" value="<?=$dados['email']?>">
                <div class="invalid-feedback"><?=$dados['email_error']?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="senha">Senha</label>
                <input type="text" class="form-control <?=$dados['senha_error'] ? 'is-invalid' : '' ?>" name="senha" id="senha">
                <div class="invalid-feedback"><?=$dados['senha_error']?></div>
            </div>
            <div class="col-md-4">
                <label for="confirmar_senha">Confirmar senha</label>
                <input type="text" class="form-control <?=$dados['confirmar_senha_error'] ? 'is-invalid' : '' ?>" name="confirmar_senha" id="confirmar_senha">
                <div class="invalid-feedback"><?=$dados['confirmar_senha_error']?></div>
            </div>
            <div class="col-md-4">
                <label for="nivel">Nível</label>
                <select name="nivel" id="nivel" class="form-control <?=$dados['nivel_error'] ? 'is-invalid' : '' ?>">
                    <option value="<?=$dados['nivel']?>"><?php if($dados['nivel'] == 1){ echo "ADMINISTRADOR"; } else { echo "OPERADOR"; } ?></option>
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2">OPERADOR</option>
                <div class="invalid-feedback"><?=$dados['nivel_error']?></div>
                </select>
            </div>
        </div>

        <div class="form-group mt-2">
            <input type="submit" name="enviar" id="enviar" value="Atualizar" class="btn btn-primary">
        </div>

    </form>
</div>