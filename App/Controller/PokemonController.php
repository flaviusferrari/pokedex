<?php

namespace App\Controller;

use App\Classes\PokemonApi;
use App\Model\PokemonModel;

class PokemonController
{
    public static function index()
    {
        $pokemon = new PokemonApi();

        $dados = [
            'pokemon' => $pokemon->getPokemon($_POST['pokemon'])
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