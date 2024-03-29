<?php

namespace Core;

class Router {
    protected $routes;
    protected $namespace = 'App\Controller\\';

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function dispatch($uri) {
        if (!array_key_exists($uri, $this->routes)) {
            return $this->handleNotFound();
        }

        $route = explode('@', $this->routes[$uri]);
        $controllerName = $route[0];
        $method = $route[1];

        $controllerNamespace = $this->namespace . $controllerName;

        if (!class_exists($controllerNamespace)) {
            return $this->handleNotFound();
        }

        $controller = new $controllerNamespace;

        if (!method_exists($controller, $method)) {
            return $this->handleNotFound();
        }

        return $controller->$method();
    }

    protected function handleNotFound() {
        http_response_code(404);
        echo 'Error 404: Not Found';
        exit;
    }
}