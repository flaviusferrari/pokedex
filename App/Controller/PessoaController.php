<?php

namespace App\Controller;

class PessoaController
{
    public static function index()
    {
        $pokemon_name = $_POST['pokemon'];

        $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon_name;

        $data = file_get_contents($url);

        $pokemon = json_decode($data);

        include '../App/View/pokemon/dados_pokemon.php';
    }

    public static function form()
    {

    }
}