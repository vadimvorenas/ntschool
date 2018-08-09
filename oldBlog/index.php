<?php

/*
 *  SELECT * FROM articles
 *  SELECT * FROM articles WHERE id_article = '4'
 *  INSERT INTO articles ('name_article') VALUES ('puppsik')
 *  DELETE FROM articles WHERE name_article = 'pupsik' OR id_article = '1'
 *  UPDATE articles SET name_arcticle='jdu' WHERE id_arcticle = '$id_arcticle'
 * */

    include_once "function.php";
    include_once "m/articles/operation_articles.php";
    include_once "m/System.php";

    session_start();
    $auth = $_SESSION['auth'] ?? false;
    issAuth($auth);

//    $files = scandir('data');
    $posts = [];
    $msg = '';
    $checkEdit = $_GET['checkEdit'] ?? 'false';

    foreach (getArticles() as $article){
        $posts[] = $article;
        if (getArticles() === false) {
            exit();
        }
    }

//    foreach ($files as $file){
//        if (is_file("data/$file")){
//            if($file != '404')
//                $posts[] = $file;
//        }
//    }


    if (isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
    }

    $view = new System();
    $vars = [
            'msg' => $msg,
            'posts' => $posts,
            'auth' => $auth,
            'chekEdit' => $checkEdit
    ];
    $title = 'Главная';
    $inner = $view->template('index', $vars);
    $html = $view->template('main', [
        'title' => $title,
        'content' => $inner
    ]);

    echo $html;
