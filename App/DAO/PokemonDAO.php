<?php

namespace App\DAO;

use App\Model\PokemonModel;
use \PDO;

class PokemonDAO 
{
    private $conn;

    public function __construct()
    {
        $dsn = 'mysql:host=pokedex-mysql-1;port=3306;dbname=pokedex;charset=utf8';

        $this->conn = new PDO($dsn, 'root', 'q1w2e3r4');
    }

    public function select()
    {
        $sql = "SELECT * FROM pokemon";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert(PokemonModel $model)
    {
        $sql = "INSERT INTO pokemon (name, front_default, weight, height, types) VALUES (?, ?, ?, ?, ?) ";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->front_default);
        $stmt->bindValue(3, $model->weight);
        $stmt->bindValue(4, $model->height);
        $stmt->bindValue(5, $model->types);

        $stmt->execute();
    }

    public function where(PokemonModel $model)
    {
        $sql = "SELECT * FROM pokemon WHERE name = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}