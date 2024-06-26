<?php

// namespace App\Functions;

function dd($dump) {
    var_dump($dump);

    die();
}

function view($path, $data = null) {
    if (!empty($data)) {
        foreach ($data as $key => $value) {
            ${$key} = $value;
        }
    }

    include "../App/View/{$path}.php";
}

function errorMessage($cod) {
    $messages = require '../App/Functions/ErrorList.php';
    
    return $messages[$cod];
}