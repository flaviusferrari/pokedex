<?php

namespace App\Controller;

class PokemonController
{
    public static function index()
    {
        $pokemon_name = $_POST['pokemon'];

        $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon_name;

        $data = file_get_contents($url);

        $dados = [
            'pokemon' => json_decode($data)
        ];

        view('pokemon/dados_pokemon', $dados);
    }

    public static function form()
    {

    }
}