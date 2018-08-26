<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="col-md-4 col-md-offset-5" style="margin: 10% 30%">
            <form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php" style="width: 500px">
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Login*</label>
                        <input type="text" name="login" value="<?=$login?>" class="form-control" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password*</label>
                        <input type="password" name="password" value="<?=$login?>" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label for="exampleInputEmai2">
                            <input type="checkbox" name="saveMe">   Запомнить меня
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default" value="Ok" style="margin-left: 50%">Submit</button>
            </form>
        </div>
        <h3 class="display-3"><?php echo $msg; ?></h3>
        <a href="view/loginAdd.php" class="btn btn-default" >Регистрация</a>
</body>
</html>


