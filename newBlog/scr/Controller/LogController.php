<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 10.08.2018
 * Time: 17:15
 */

namespace Blog\scr\Controller;

use Blog\scr\model\LogModel;

class LogController
{
    private $db;
    private $log;

    public function __construct($db)
    {
        $this->db = $db;
        $this->log = new LogModel($this->db);
    }

    public function entry()
    {
        $this->log->setEntry();
    }
}