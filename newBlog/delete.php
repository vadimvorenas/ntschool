<?php

    include_once "function.php";
    include_once 'm/articles/operation_articles.php';

    session_start();
    $id_article = $_GET['id_article'];
//    $title = $_GET['fname'];
    $auth = $_SESSION['auth'] ?? false;
    issAuth($auth);

    if (!$auth){
        header("location:login.php?refferer=edit.php?id_article=" . "$id_article");
        exit();
    }

//    function delteTitle($name){
//        unlink("data/$name");
//    }

    deleteArticle($id_article);
//    delteTitle($_GET['fname']);
    $_SESSION['msg'] = 'Статья успешно удалена';
    header("location:index.php");
    exit();