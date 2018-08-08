<?php

    include_once "function.php";
    include_once "m/articles/operation_articles.php";
    include_once "m/System.php";

session_start();
    $id_article = $_GET['id_article'];
    $article = getArticles($id_article);
    $nameArticle = $article['name_article'] ?? '';
    $content = $article['content'];
    $auth = $_SESSION['auth'] ?? false;
    issAuth($auth);

//    $title = strip_tags($_GET['fname']) ?? '404';
    if ($nameArticle == '' ) {
        header("location:index.php");
        exit();
    }

//    if (checkTitle($nameArticle)) {
//        $_GET['fname'] = '';
//        header("location:index.php");
//        exit();
//    }
//    else{
//        $nameArticle = strip_tags($_GET['fname']) ?? '404';
//    }
//
//    if (file_exists("data/$nameArticle")){
//        $content    = file_get_contents("data/$nameArticle");
//    }
//    else{
//        $msg        = 'нет такой статьи';
//        goto a;     //пропускаем блок ПОСТ
//    }

    if (count($_POST) > 0){
        $nameArticle        = strip_tags($_POST['nameArticle']);
        $content            = strip_tags($_POST['content']);

            if (checkTitle($nameArticle)){
                $msg    = 'Название только из цифр и латинских букв';
            }
            elseif (iconv_strlen($content)<2){
                $msg    = 'Содержание должно быть больше 2 символов';
            }
            elseif ($nameArticle != $article['name_article']){
                $msg = 'Менять название статьи сейчас недоступно';
            }
            elseif ($nameArticle == $_POST['nameArticle']) {
                updateArticle($id_article,$content);
//                file_put_contents("data/$nameArticle", "$content");
                $_SESSION['msg'] = 'Статья успешно обновлена!';
                header('location: index.php');
                exit();
            }
//            elseif (file_exists("data/$nameArticle")){
//                $msg    = 'Название должно быть уникальным';
//            }
            else{
//                unlink("data/$_GET[fname]");
//                file_put_contents("data/$nameArticle", "$content");
//                header('location: index.php');
//                exit();
            }
    }
        else{
        echo $msg = '';
    }
//         a:
    $nameArticle = $article['name_article'] ?? '';
    include_once 'v/v_edit.php';