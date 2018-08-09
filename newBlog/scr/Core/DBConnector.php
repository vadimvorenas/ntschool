<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 08.08.2018
 * Time: 12:31
 */

namespace Blog\scr\Core;


class DBConnector
{
    private $pdo;

    public function __construct()
    {
        $dsn = sprintf("%s:host=%s;dbname=%s", 'mysql', '127.0.0.1', 'php1course');
        $this->pdo = new \PDO($dsn, 'mysql', 'mysql');
    }

    public function connect ()
    {

        return $this->pdo;
    }
}