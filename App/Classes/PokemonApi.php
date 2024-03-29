<?php

namespace App\Classes;

class PokemonApi 
{
    private $base = 'https://pokeapi.co/api/v2/';
    private $pokemon;

    public function __construct($pokemon_name)
    {
        $this->pokemon = $this->sanitize($pokemon_name);
    }

    public function getPokemon()
    {
        $url = $this->base . 'pokemon/'. $this->pokemon;

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