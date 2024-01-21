<?php

// namespace App\Functions;

function dd($dump) {
    var_dump($dump);

    die();
}


function view($path, $data) {
    foreach ($data as $key => $value) {
        ${$key} = $value;
    }

    include "../App/View/{$path}.php";
}