<?php

namespace Blog;

include_once "autoload.class.php";

use Blog\Model\ArticlesModel;
use Blog\Model\SystemModel;
use Blog\scr\model\Users;
//include_once 'scr/model/Users/SystemModelUser.php';

/*
 *  SELECT * FROM articles
 *  SELECT * FROM articles WHERE id_article = '4'
 *  INSERT INTO articles ('name_article') VALUES ('puppsik')
 *  DELETE FROM articles WHERE name_article = 'pupsik' OR id_article = '1'
 *  UPDATE articles SET name_arcticle='jdu' WHERE id_arcticle = '$id_arcticle'
 * */

    include_once "scr/model/System.php";

    session_start();
    $auth = $_SESSION['auth'] ?? false;
    $auth = new Users\SystemModelUser($auth);
    $auth->issAuth();


    $db = new \PDO('mysql:host=127.0.0.1;dbname=php1course', 'mysql', 'mysql');
    $articles = new ArticlesModel($db);
    $posts = $articles->getAllArticles();
    $msg = '';
    $checkEdit = $_GET['checkEdit'] ?? 'false';

    if (isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
    }

    $view = new SystemModel();
    $vars = [
            'msg' => $msg,
            'posts' => $posts,
            'auth' => $auth->getAuth(),
            'chekEdit' => $checkEdit
    ];
    $title = 'Главная';
    $inner = $view->template('index', $vars);
    $html = $view->template('main', [
        'title' => $title,
        'content' => $inner
    ]);

    echo $html;
