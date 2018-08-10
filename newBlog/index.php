<?php

namespace Blog;

include_once "autoload.class.php";


use Blog\scr\model\Users;
use Blog\scr\Core;

    session_start();
    $auth = new Users\SystemModelUser($_SESSION['auth'] ?? false);
    $auth->issAuth();

    $db = new Core\DBConnector();
    $db = $db->connect();
    $route = new Core\Route($db);

    $title = 'Главная';
//echo '<pre>';
//var_dump($_SERVER);
//echo '</pre>';
