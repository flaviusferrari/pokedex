<?php

use App\Controller\HomeController;
use App\Controller\PessoaController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        HomeController::index();
        break;

    case '/pokemon':
        PessoaController::index();
        break;
    
    default:
        echo 'ERRO 404';
        break;
}