<?php

    include_once 'function.php';
    include_once 'm/articles/operation_articles.php';
    include_once 'm/System.php';

    session_start();
    $auth = $_SESSION['auth'] ?? false;
    issAuth($auth);

    if (count($_POST) > 0){
        $nameArticle = $_POST['nameArticle'];
        $content = $_POST['content'];

        if (checkTitle($nameArticle)){
            var_dump(($nameArticle));
            $msg = 'Название только из цифр и букав';
        }
        elseif (existNameArticle("$nameArticle")){
            $msg = 'Название должно быть уникальным';
        }
        elseif (iconv_strlen($nameArticle)<2){
            $msg = 'Название должно быть больше 2 символов';
        }
        elseif (iconv_strlen($content)<2){
            $msg = 'Содержание должно быть больше 2 символов';
        }
        else{
            setArticles("$nameArticle", "$content");
            header('location: index.php');
            $_SESSION['msg'] = 'Статья успешно добавлена!';
            exit();
        }

    }
    else{
        echo $msg = '';
    }
    $view = new System();
    $title = 'Добавить статью';
    $inner = $view->template('add', [
        'nameArticle'   => $nameArticle ?? '',
        'content'       => $content ?? '',
        'msg'           => $msg
    ]);
    $html = $view->template('main', [
        'title'     => $title,
        'content'   => $inner
    ]);

    echo $html;
