<?php

use App\Controller\PessoaController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        echo 'está na barra';
        break;

    case '/pessoa':
        PessoaController::index();
        break;
    
    default:
        echo 'ERRO 404';
        break;
}