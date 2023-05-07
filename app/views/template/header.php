<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="<?= CSS ?>">
    <link rel="stylesheet" href="<?= FONT ?>">
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?=URL?>/site/home" class="nav-link px-2 text-white">Início</a></li>
                    <li><a href="<?=URL?>/usuarios/listar" class="nav-link px-2 text-white">Usuário</a></li>
                </ul>

                <div class="text-end">
                    <?php if(isset($_SESSION['usuario_id'])) { ?>
                        <p>Olá, <?=$_SESSION['usuario_nome']?></p>
                        <a class="btn btn-danger btn-sm" href="<?=URL?>/login/sair">Sair</a>
                    <?php } else { ?>
                        <a href="<?=URL?>/login/login" class="btn btn-outline-light me-2">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>