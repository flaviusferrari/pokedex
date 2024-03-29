<?php

use Core\Router;

function routes()
{
   return require '../routes/routes.php';
}

function router() 
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $router = new Router($routes);
    $router->dispatch($uri);
}

