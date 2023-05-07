<div class="container my-3">
    <h2>Deletar usuário</h2>
    <form action="<?=URL?>/usuarios/excluir" method="post">

        <div class="form-group my-4">
            <input type="hidden" name="id" value="<?=$dados['id']?>">
            <h3>Deseja excluir o registro  <b><?=$dados['nome']?></b>  ?</h3>
        </div>
        

        <div class="form-group mt-2">
            <input type="submit" name="enviar" id="enviar" value="Sim, excluir" class="btn btn-danger">
            <a class="btn btn-warning" href="<?=URL?>/usuarios">Não</a>
        </div>

    </form>
</div>