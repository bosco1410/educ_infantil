<?php

use app\helpers\Message;
?>
<style>
    .row {
        display: inline-block;
        width: 100%;
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .side-left {
        width: 50%;
        height: 40px;
        float: left;
        text-align: left;
        padding-top: 5px;
    }
    .side-right {
        width: 50%;
        height: 40px;
        float: right;
        text-align: right;
        padding-top: 2px;
    }
    .card-header {
        height: 50px;
        padding-top: 4px;
        padding-bottom: 0px;
    }
</style>
<div class="container py-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=URL?>/relatorios">Selecionar turma</a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
        </ol>
    </nav>
    <div class="card my-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 side-left">
                    <h3 class="card-title">Relatórios</h3>
                </div>
                <div class="col-md-6 side-right">
                    <a class="btn btn-primary float-end" href="<?=URL?>/relatorios/criarRelatorio">Criar relatório</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <?=Message::showMessage('relatorios')?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Semestre</th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
               
                <?php 
                if(!$dados['relatorios']){
                    echo '<tr><td colspan="6">REGISTRO NÃO LOCALIZADO!</div>';
                }else{
                foreach ($dados['relatorios'] as $report) { ?>
                <tr>
                   <td><?=$report->id_aluno?></td>
                   <td><?=$report->nome_aluno?></td>
                   <td><?=$report->semestre?></td>
                   <td>
                    <a href="<?= URL.'/relatorios/visualizar/' . $report->id_aluno ?>" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                   </td>
                   <td>
                    <a href="<?= URL.'/relatorios/deletar/' . $report->id_aluno ?>" title="Deletar"><i class="fa-solid fa-trash" style="color: #f01c05;"></i></a>
                   </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        </div>
    </div>
</div>