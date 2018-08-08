<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 07.08.2018
 * Time: 1:30
 */

namespace Blog\Model;


class ArticlesModel extends BaseModel implements BaseModelInterface
{

    public function __construct(\PDO $db)
    {
        $this->name_db = 'articles';
        parent::__construct($db, $this->name_db);
    }

    function setArticles($title, $content)
    {

        $title = trim(htmlspecialchars($title));
        $content = trim(htmlspecialchars($content));

        $db =$this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf( "INSERT INTO %s (name_article, content) VALUES ( :title, :content)", $this->name_db);
        $params = ['title' => $title, 'content' => $content];
        $query = $db->prepare($sql);

        try{
            $query->execute($params);
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    function updateArticle ($id, $content)
    {
        $id = SystemModel::trimName($id);
        $content = SystemModel::trimName($content);
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf( "UPDATE %s SET content = :content WHERE id = :id", $this->name_db);

        $params = ['id' => $id, 'content' => $content];
        $query = $db->prepare($sql);

        try{
            $query->execute($params);
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    function existNameArticle ($title)
    {
        // @todo return true
        $title = SystemModel::trimName($title);
        $articles = $this->getAllArticles();

        foreach ($articles as $article){
            if ($article['name_article'] == $title){
                return true;
            }
            return false;
        }
    }
}