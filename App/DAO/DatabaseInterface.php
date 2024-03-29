<?php

namespace App\DAO;

use \PDO;

interface DatabaseInterface
{
    // public function connect();

    public function prepare($sql);

    public function bindValue($parameter, $value);

    public function execute();

    public function rowCount();

    public function fetch();

    public function fetchAll();
}