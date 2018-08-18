<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 09.08.2018
 * Time: 22:53
 */

include_once 'SystemModelUser.php';

class UserModel extends SystemModelUser
{
    private $db;
    private $table_name = 'mail';
    private $tableHash = 'onePC2';

    public function __construct(PDO $db, $auth = false)
    {
        $this->db = $db;
        $login = (string) $_SESSION['login'] ?? '';
        $password = (string) $this->getUserByLogin($login)['password'];
        parent::__construct($auth, $login, $password);
    }

    public function getUsers ()
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s", $this->table_name);
        $query = $db->prepare($sql);
        $query->execute();

        try{
            return $query->fetchAll();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getUserByLogin (string $login)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s WHERE login = :login", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':login', $login);
        $query->execute();

        try{
            return $query->fetch();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getUserById ($id)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s WHERE id = :id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id', $id);
        $query->execute();

        try{
            return $query->fetch();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function addUser(string $login, string $password)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("INSERT INTO %s (login, password) VALUES (:login, :password)", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':login', $login);
        $query->bindParam(':password', $password);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function addUserHash(int $id, string $hash)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("INSERT INTO %s (id_user, sessid) VALUES (:id, :hash)", $this->tableHash);
        $query = $db->prepare($sql);

        $query->bindParam(':id', $id);
        $query->bindParam(':hash', $hash);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function deletedUser(int $id)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("UPDATE %s SET deleted = 1 WHERE id = : id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id',$id);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function editUser (int $id, string $login, string $password)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("UPDATE %s SET login = :login, password = :password  WHERE id = : id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id',$id);
        $query->bindParam(':login', $login);
        $query->bindParam(':password', $password);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

}
