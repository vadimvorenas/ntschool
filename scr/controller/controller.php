<?php

class controller
{
    protected $db;
    protected $user;

    public function __construct(PDO $db, $user)
    {
        $this->user = $user;
        $this->db = $db;
    }
}
