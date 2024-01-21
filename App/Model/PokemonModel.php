<?php

namespace App\Model;

use App\DAO\PokemonDAO;

class PokemonModel 
{
    public $name, $front_default, $weight, $height, $types;

    public function save()
    {
        $dao = new PokemonDAO();

        $dao->insert($this);
    }
}