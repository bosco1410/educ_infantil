<style>
    .title-name {
        height: 50px;
    }
</style>
<div class="container py-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=URL?>/relatorios">Relatórios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header bg-secondary text-white title-name">
            <h3 class="card-title"><?= $dados['relatorios']->nome_aluno ?></h3>
        </div>
        <div class="card-body">
            <p class="card-text">
                <?= $dados['relatorios']->relatorio ?>
            </p>
            <a href="#" class="btn btn-primary">Imprimir</a>
        </div>
        <div class="card-footer text-body-secondary">
            <small><?= $dados['relatorios']->data_cad ?></small>
        </div>
    </div>
</div>