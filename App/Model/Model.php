<?php

namespace App\Model;

use App\DAO\PdoDatabase;

class Model
{
    private $database;

    public function __construct()
    {
        $this->database = new PdoDatabase();
    }

    public function all()
    {
       $sql = "SELECT * FROM {$this->table}";
       $this->database->prepare($sql);
       $this->database->execute();
       return $this->database->fetchAll();
    }

    public function find($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = ?";
        $this->database->prepare($sql);
        $this->database->bindValue(1, $value);
        $this->database->execute();
        return $this->database->fetch();
    }

}