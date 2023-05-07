<?php

//URL BASE
define('URL', 'http://localhost/educ_infantil');

//BANCO DE DADOS
$env = realpath(dirname(__FILE__) . '/../env/env.ini');
if(file_exists($env)){
    $ini = parse_ini_file($env);
    define('HOST', $ini['host']);
    define('USER', $ini['user']);
    define('PASS', $ini['pass']);
    define('PORT', $ini['port']);
    define('DB', $ini['database']);
}else{
    echo "Invalid";
}

//CSS
define('CSS', URL . '/public/css/bootstrap.min.css');
define('FONT', URL . '/public/css/style_font.css');

//JS
define('JS', URL . '/public/js/bootstrap.bundle.min.js');

//ICONS
define('ICONS', 'https://kit.fontawesome.com/d7ac4f82db.js');