<?php

use App\Controller\HomeController;
use App\Controller\PokemonController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        HomeController::index();
        break;

    case '/pokemon':
        PokemonController::index();
        break;
    
    default:
        echo 'ERRO 404';
        break;
}