<?php

namespace App\DAO;

use App\DAO\DatabaseInterface;
use \PDO;


class PdoDatabase implements DatabaseInterface
{
    private $pdo;
    private $objectPdo;

    public function __construct()
    {
        $dsn = 'mysql:host=pokedex-mysql-1;port=3306;dbname=pokedex;charset=utf8';

        $username = 'root';
        $password = 'q1w2e3r4';

        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql)
    {
        $this->objectPdo = $this->pdo->prepare($sql);
    }

    public function bindValue($parameter, $value)
    {
        $this->objectPdo->bindValue($parameter, $value);
    }

    public function execute()
    {
        $this->objectPdo->execute();
    }

    public function rowCount()
    {
        return $this->objectPdo->rowCount();
    }

    public function fetch()
    {
        return $this->objectPdo->fetch();
    }

    public function fetchAll()
    {
        return $this->objectPdo->fetchAll();
    }
}