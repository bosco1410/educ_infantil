<style>
    .doc {
        height: 50px;
    }
</style>
<div class="container py-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=URL?>/relatorios">Relatórios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar relatório</li>
        </ol>
    </nav>
    <form action="" method="post">
        <div class="card">
            <div class="card-header doc">
                <h3 class="card-title">Criar relatório</h3>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="turma">Selecione a turma</label>
                            <select name="turma" id="id_turma" class="form-control" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($dados['turmas'] as $turma) { ?>
                                    <option value="<?= $turma->id_turma ?>"><?= $turma->nome_turma ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="aluno">Selecione o aluno</label>
                            <select name="aluno" id="id_aluno" class="form-control" required>
                                <option value="">Selecione...</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="semestre">Semestre</label>
                        <select name="semestre" id="id_semestre" class="form-control" required>
                            <option value="">Semestre...</option>
                            <option value="1º SEMESTRE">1º SEMESTRE</option>
                            <option value="2º SEMESTRE">2º SEMESTRE</option>
                        </select>
                    </div>

                </div>

                <div class="form-group mt-2">
                    <label for="relatorio">Relatório</label>
                    <textarea name="relatorio" id="relatorio" cols="30" rows="8" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Gravar" name="enviar" id="enviar">
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>
    $('#id_turma').change(function() {
        var valor = document.getElementById("id_turma").value;
        $.get('<?= URL ?>/relatorios/listarAlunos/&id=' + valor, function(data) {
            $('#id_aluno').find("option").remove();
            $('#id_aluno').append(data);
        });
    });
</script>