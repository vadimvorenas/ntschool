<?php

class DB
{
    private $pdo;

    public function __construct()
    {
        $dsn = sprintf("%s:host=%s;dbname=%s", 'mysql', '127.0.0.1', 'php1course');
        $this->pdo = new PDO($dsn, 'mysql', 'mysql');
    }

    public function connect ()
    {

        return $this->pdo;
    }
}