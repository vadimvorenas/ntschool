<?php

namespace Blog;

include_once "autoload.class.php";

use Blog\Model\ArticlesModel;
use Blog\Model\SystemModel;
use Blog\scr\model\Users;
use Blog\scr\Core;

    session_start();
    $auth = new Users\SystemModelUser($_SESSION['auth'] ?? false);
    $auth->issAuth();

    $db = new Core\DBConnector();
    $db = $db->connect();
    $route = new Core\Route($db);
    $msg = '';
    $checkEdit = $_GET['checkEdit'] ?? 'false';

    if (isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
    }

    $view = new Core\Templater();
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
