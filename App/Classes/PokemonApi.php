<?php

namespace App\Classes;

class PokemonApi 
{
    private $base = 'https://pokeapi.co/api/v2/';

    public function getPokemon($pokemon_name)
    {
        $pokemon = $this->sanitize($pokemon_name);

        $url = $this->base . 'pokemon/'. $pokemon;

        $data = file_get_contents($url);

        if (empty($data)) {
            $data = [
                'error' => '300'
            ];
            return  (object)$data;
        }

        return json_decode($data);
    }

    private function sanitize($name) {
        $name = strtolower($name);
    
        return trim($name);
    }

}