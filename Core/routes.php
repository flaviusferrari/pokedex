<?php

function routes()
{
   return require '../routes/routes.php';
}

function router() 
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    extractRoute($uri, $routes);
}

function extractRoute($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        $route = explode('@', $routes[$uri]);
        
        $namespace = 'App\Controller\\';
        $nameController = $route[0];
        $method = $route[1];
        
        $controllerNamespace = $namespace.$nameController;

        $controller = new $controllerNamespace;

        $controller->$method();
    } else {
        echo 'ERRO 404';
    }
}

