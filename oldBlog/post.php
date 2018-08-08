<?php

    include_once 'model/articles/operation_articles.php';


    $id_article = $_GET['id_article'] ?? '404';
    $nameArticle = getArticles($id_article)['name_article'];
    $content = getArticles($id_article)['content'];
//    $content =file_get_contents("data/$fname");

    include_once 'v/v_post.php';

