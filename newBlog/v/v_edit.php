<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post">
    <div>
        <div>Название</div>
        <input title="text" name="nameArticle" value="<?php echo $nameArticle ?? ''?>">
    </div>
    <div>
        <div>Контент</div>
        <textarea name="content"><?php echo $content ?? ''?></textarea>
    </div>
    <input type="submit">
    <input type="reset">
</form>
<p><?php echo $msg ?></p>
</body>
</html>