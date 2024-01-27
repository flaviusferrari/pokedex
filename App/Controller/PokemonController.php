<?php

namespace App\Controller;

use App\Model\PokemonModel;

class PokemonController
{
    public static function index()
    {
        $pokemon_name = sanitize($_POST['pokemon']);

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
        
        $model->name = $_POST['nome'];
        $model->front_default = $_POST['foto'];
        $model->weight = $_POST['peso'];
        $model->height = $_POST['altura'];
        $model->types = $_POST['tipo'];

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