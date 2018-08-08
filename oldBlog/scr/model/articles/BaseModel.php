<?php

namespace Blog\Model;

include_once 'BaseModelInterface.php';

class BaseModel implements BaseModelInterface
{
    protected $db;
    protected $name_db;

    public function __construct(\PDO $db, $name_db)
    {
        $this->db = $db;
        $this->name_db = $name_db;
    }

    public function getAllArticles()
    {
        $sql = sprintf("SELECT * FROM %s", $this->name_db);
        $stmp = $this->db->query($sql);

        try{
            return $stmp->fetchAll();
        }
        catch (\Exception $exception){
            echo "Проблемы с подключением к БД" . $exception->getMessage();
        }
        // TODO: Implement getAll() method.
    }

    public function getByArticle(int $id)
    {
        if ($id != null){
            $id = SystemModel::trimName($id);
        }
        $sql = sprintf("SELECT * FROM %s where id = :id", $this->name_db);
        $stmp = $this->db->prepare($sql);
        $stmp->execute(
            ['id' => $id]
        );

        try{
            return $stmp->fetchAll();
        }
        catch (\Exception $exception){
            echo "Проблемы с подключением к БД" . $exception->getMessage();
        }

        // TODO: Implement getBy() method.
    }

    public function deletedArticle(int $id)
    {
        $sql = sprintf("DELETE %s WHERE id = :id" , $this->name_db);
        $stmp = $this->db->prepare($sql);

        try{
            $stmp = $stmp->execute([
                'id' => $id
            ]);
            return true;
        }
        catch (\Exception $exception){
            echo "Проблемы с подключением к БД" . $exception->getMessage();
        }

        // TODO: Implement deleted() method.
    }

    /**
     * @return \PDO
     */
    public function getDb(): \PDO
    {
        return $this->db;
    }

    /**
     * @param \PDO $db
     */
    public function setDb(\PDO $db): void
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getNameDb()
    {
        return $this->name_db;
    }

    /**
     * @param mixed $name_db
     */
    public function setNameDb($name_db): void
    {
        $this->name_db = $name_db;
    }



}