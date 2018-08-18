<?php

include_once 'scr/controller/UserController.php';
include_once 'scr/Core/DB.php';
include_once 'scr/controller/controller.php';
include_once 'scr/controller/MailController.php';

session_start();

$db = new DB();
$db = $db->connect();
$user = new UserModel($db);
$mail = new MailController($db, $user);
$controller = new UserController($db);
$id =  $user->getUserByLogin((string) $_SESSION['login'] ?? '');
$form = $mail->get( (string) $id['id']);
$auth = $user->issAuth();
//var_dump($form);


if (count($_POST)>0){

    if (isset($_POST['passwrod_confirmation'])){
        $controller->add();
    }
    elseif (isset($_POST['login']) && $auth) {
        $controller->in();
        header("Location: index.php");
        include_once 'view/form.php';
    }
    elseif ((isset($_POST['out'])) && $auth){
        $controller->out();
        header("Location: view/form.php");
    }
    elseif (isset($_POST['send']) && $auth){
        $mail->send();
        header("Location: index.php");
        include_once 'view/form.php';
    }
    elseif (isset($_POST['del']) && $auth){
        unset($_POST['del']);
        foreach ($_POST as  $value){
            $mail->delete($value);
        }
        header("Location: index.php");
        include_once 'view/form.php';
    }
    else {
        if (!$user->issAuth()) {
            include_once 'view/login.php';
        }
        else{
            header("Location: index.php");
            include_once 'view/form.php';
        }
    }
}
else {
    if (!$auth) {
        include_once 'view/login.php';
    }
    else{
        include_once 'view/form.php';
    }
}