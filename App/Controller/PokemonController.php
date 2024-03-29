<?php

namespace App\Controller;

use App\Classes\PokemonApi;
use App\Model\PokemonModel;

class PokemonController
{
    public static function index()
    {
        if (empty($_POST['pokemon'])) {
            $error = '301';
            return view('home', compact('error'));
        }

        $model = new PokemonModel();
        $model->name = $_POST['pokemon'];
        $poke = $model->getPokemonByName();

        $pokemon = new PokemonApi();
        $pokemon_result = $pokemon->getPokemon($_POST['pokemon']);

        if (isset($pokemon_result->error)) {
            return view('home', $pokemon_result);
        }

        $dados = [
            'pokemon' => $pokemon_result,
            'favorito' => (empty($poke))? true:false,
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
        $model->types = json_encode($_POST['tipo']);

        $model->save();

        header("Location: /pokemon/list");
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