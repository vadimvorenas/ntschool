<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 10.08.2018
 * Time: 17:12
 */

namespace Blog\scr\Core;


class Log
{
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function entry()
    {

    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }
}