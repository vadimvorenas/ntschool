<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php" style="width: 500px">
    <div>
        Login<br>
        <input type="text" name="login" value="<?=$login?>" style="width: 50%" >
    </div>
    <div>
        Password<br>
        <input type="password" name="password" style="width: 50%">
        &nbsp; &nbsp; Запомнить меня
            <input type="checkbox" name="saveMe">
    </div>
    <br>
    <input type="submit" value="Ok" style="margin-left: 50%">
</form>
<h3><?php echo $msg; ?></h3>
<a href="view/loginAdd.php" >Регистрация</a>

</body>
</html>

