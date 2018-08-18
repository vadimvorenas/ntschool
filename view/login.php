<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" action="index.php">
    <div>
        Login<br>
        <input type="text" name="login" value="<?=$login?>">
    </div>
    <div>
        Password<br>
        <input type="password" name="password">
    </div>
    <br>Запомнить меня
    <input type="checkbox" name="saveMe">
    <input type="submit" value="Ok">
</form>
<h3><?php echo $msg; ?></h3>
<a href="view/loginAdd.php?registration=true" >Регистрация</a>

</body>
</html>

