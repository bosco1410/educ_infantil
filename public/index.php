<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use app\libraries\Router;

include __DIR__ . '/../app/views/template/header.php';

$routes = new Router();

include __DIR__ . '/../app/views/template/footer.php';