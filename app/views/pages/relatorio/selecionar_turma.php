<style>
    .doc {
        height: 50px;
    }
</style>
<div class="container py-3">
    <form action="<?=URL?>/relatorios/listar" method="post">
        <div class="card">
            <div class="card-header doc">
                <h3 class="card-title">Consultar</h3>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="turma">Selecione a turma</label>
                  <select name="turma" id="turma" class="form-control" required>
                        <option value="">Selecione a turma</option>
                        <?php foreach ($dados['turmas'] as $turma) { ?>
                            <option value="<?= $turma->idTurma ?>"><?= $turma->nome_turma ?></option>
                        <?php } ?>
                  </select>
               </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Buscar" name="buscar" id="buscar">
                </div>
            </div>
        </div>
    </form>
</div>