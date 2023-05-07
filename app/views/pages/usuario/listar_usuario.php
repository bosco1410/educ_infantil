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
<div class="container">
    <div class="card my-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 side-left">
                    <h3 class="card-title">Usuários</h3>
                </div>
                <div class="col-md-6 side-right">
                    <a class="btn btn-primary float-end" href="<?=URL?>/usuarios/cadastrar">Cadastrar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <?=Message::showMessage('usuarios')?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nível</th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
               
                <?php 
                if(!$dados){
                    echo '<tr><td colspan="4" class="alert alert-warning">REGISTRO NÃO LOCALIZADO!</div>';
                }else{
                foreach ($dados['usuarios'] as $user) { ?>
                <tr>
                   <td><?=$user->id?></td>
                   <td><?=$user->nome?></td>
                   <td><?=$user->nivel?></td>
                   <td>
                    <a href="<?= URL.'/usuarios/editar/' . $user->id ?>" title="Editar"><i class="fa-solid fa-pen" style="color: #047c06;"></i></a>
                   </td>
                   <td>
                    <a href="<?= URL.'/usuarios/editar/' . $user->id ?>" title="Deletar"><i class="fa-solid fa-trash" style="color: #f01c05;"></i></a>
                   </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        </div>
    </div>
</div>