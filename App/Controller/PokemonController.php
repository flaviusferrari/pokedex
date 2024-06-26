<?php

namespace App\Controller;

use App\Classes\PokemonApi;
use App\Model\PokemonModel;

class PokemonController
{
    public function index()
    {
        if (empty($_POST['pokemon'])) {
            $error = '301';
            return view('home', compact('error'));
        }

        $pokemon = $this->findPokemon($_POST['pokemon']);

        if (!empty($pokemon)) {
            $dados = [
                'pokemon' => $pokemon,
                'favorito' => false,
            ];

            return view('pokemon/dados_pokemon', $dados);
        }

        $pokemon = new PokemonApi($_POST['pokemon']);
        $pokemon_result = $pokemon->getPokemon();

        if (isset($pokemon_result->error)) {
            return view('home', $pokemon_result);
        }

        $dados = [
            'pokemon' => $pokemon_result,
            'favorito' => true,
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
        $pokemons = new PokemonModel();

        $dados = [
            'pokemons' => $pokemons->all()
        ];

        view('pokemon/listagem', $dados);
    }

    private function findPokemon($pokemon_name)
    {
        $pokemon = new PokemonModel();
        $poke = $pokemon->find('name', $pokemon_name);

        return $poke;
    }
}