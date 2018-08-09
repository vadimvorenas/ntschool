<?php

function setArticles($title, $content)
{

    $title = trim(htmlspecialchars($title));
    $content = trim(htmlspecialchars($content));

    $db = new PDO('mysql:host=127.0.0.1;dbname=php1course', 'mysql', 'mysql');
    $db->exec('SET NAMES UTF8');

    $sql = "INSERT INTO articles (name_article, content) VALUES ( :title, :content)";
    $params = ['title' => $title, 'content' => $content];
    $query = $db->prepare($sql);
    $query->execute($params);

    $info  = $query->errorInfo();

    if ($info[0] != PDO::ERR_NONE){
        echo $info[2];
        exit();
    }
}

function getArticles($id_arcticle=null)
{ // @todo получение информации о статье, по умолчанию всех. или заданному по ИД

    if ($id_arcticle != null){
        $id_arcticle = trim(htmlspecialchars($id_arcticle));
    }
    $db = new PDO('mysql:host=127.0.0.1;dbname=php1course', 'mysql', 'mysql');
    $db->exec('SET NAMES UTF8');

        if ($id_arcticle === null) {
            $sql = "SELECT * FROM articles ORDER BY dt_reg DESC";
            $query = $db->prepare($sql);
            $query->execute();
        }
        else{
            $sql = "SELECT * FROM articles WHERE id_article = :id_article";
            $params = ['id_article' => $id_arcticle];
            $query = $db->prepare($sql);
            $query->execute($params);
        }

    $info  = $query->errorInfo();

        if ($info[0] != PDO::ERR_NONE){
            echo $info[2];
            exit();
        }

        if ($id_arcticle === null) {
            return $query->fetchAll();
        }
        else{
            return $query->fetch();
        }
}

function existNameArticle ($title)
{
    // @todo return true
    $title = trim(htmlspecialchars(strip_tags($title)));
    $articles = getArticles();

    foreach ($articles as $article){
        if ($article['name_article'] == $title){
            return true;
        }
    }
}

function deleteArticle ($id_article)
{
    $id_article = trim(htmlspecialchars($id_article));
    $db = new PDO('mysql:host=127.0.0.1;dbname=php1course', 'mysql', 'mysql');
    $db->exec('SET NAMES UTF8');

    $sql = "DELETE FROM articles WHERE id_article=:id_article";

    $params = ['id_article' => $id_article];
    $query = $db->prepare($sql);
    $query->execute($params);

    $info  = $query->errorInfo();

    if ($info[0] != PDO::ERR_NONE){
        echo $info[2];
        exit();
    }
}

function updateArticle ($id_article, $content)
{
    $id_article = trim(htmlspecialchars($id_article));
    $content = trim(htmlspecialchars($content));
    $db = new PDO('mysql:host=127.0.0.1;dbname=php1course', 'mysql', 'mysql');
    $db->exec('SET NAMES UTF8');

    $sql = "UPDATE articles SET content = :content WHERE id_article = :id_article";

    $params = ['id_article' => $id_article, 'content' => $content];
    $query = $db->prepare($sql);
    $query->execute($params);

    $info  = $query->errorInfo();

    if ($info[0] != PDO::ERR_NONE){
        echo $info[2];
        exit();
    }
}
