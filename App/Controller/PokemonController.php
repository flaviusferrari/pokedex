<?php

namespace App\Controller;

use App\Model\PokemonModel;

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

    public static function save()
    {
        $model = new PokemonModel();
        
        $model->name = 'squirtle';
        $model->front_default = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png';
        $model->weight = '90';
        $model->height = '5';
        $model->types = 'water';

        $model->save();

        header("Location: /");
    }

    public static function list()
    {
        $model = new PokemonModel();

        $dados = [
            'pokemons' => $model->getAllRows()
        ];

        view('pokemon/listagem', $dados);
    }
}