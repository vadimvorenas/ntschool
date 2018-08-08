<?php

    include_once "function.php";
    session_start();

    $msg = '';

    if (count($_POST) > 0){
        $login      = $_POST['login'];
        $password   = $_POST['password'];
        $refferer   = $_GET['refferer'] ?? 'index.php';

        if ($login == 'admin' && $password == 'admin'){
            $_SESSION['auth']   = true;

            if (isset($_POST['saveMe'])){
                setcookie('login', myHash($login), time() + 3600*24*7);
                setcookie('pass', myHash($password), time() + 3600*24*7);
            }
        header("location:$refferer");
        exit();
        }
        else{
            $msg = 'Логин или пароль неверны';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post">
    <div>
        Login<br>
        <input type="text" name="login">
    </div>
    <div>
        Password<br>
        <input type="password" name="password">
    </div>
    <br>Запомнить меня
    <input type="checkbox" name="saveMe">
    <input type="submit" value="Ok">
</form>
<?php echo $msg; ?>
</body>
</html>
