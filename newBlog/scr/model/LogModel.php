<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 10.08.2018
 * Time: 17:17
 */

namespace Blog\scr\model;


class LogModel
{
    private $db;
    private $table_name = 'logEntry';

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function setEntry ()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $referer_url =$_SERVER['HTTP_REFERER'];
        $method = $_SERVER['REQUEST_METHOD'];

        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("INSERT INTO %s (ip, user_agent, referer, method) 
                VALUES (:ip, :user_agent, :referer_url, :method)", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':ip', $ip);
        $query->bindParam(':user_agent', $user_agent);
        $query->bindParam(':referer_url', $referer_url);
        $query->bindParam(':method', $method);

        try{
            $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }

}