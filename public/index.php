<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo 'URL: ' . $url;


switch ($url) {
    case '/':
        echo 'está na barra';
        break;
    
    default:
        echo 'não encontrou';
        break;
}