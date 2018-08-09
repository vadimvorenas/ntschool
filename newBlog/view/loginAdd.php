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
    <div>
        Password Confirmation<br>
        <input type="passwrod_confirmation" name="passwrod_confirmation">
    </div>
    <br>Запомнить меня
    <input type="checkbox" name="saveMe">
    <input type="submit" value="Ok">
</form>
<?php echo $msg; ?>
</body>
</html>