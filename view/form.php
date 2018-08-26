<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="" content="">
    <title>Mail</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-latest.js" language="JavaScript"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.js" language="JavaScript"></script>
    <link rel="stylesheet" href="view/css/style.css" type="text/css"/>
    <script type="text/javascript" src="view/js/jquery-latest.js" language="JavaScript"></script>
    <script type="text/javascript" src="view/js/jquery.tablesorter.js" language="JavaScript"></script>
    <script type="text/javascript" src="view/js/jquery.tablesorter.pager.js" language="JavaScript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($)
            {
                $("#myTable").tablesorter({

                });
            }
        );

    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


</head>
<body>
<a href="/Blog/Laravel/test_ITmaster/my/view/logout.php" class="btn btn-primary" style="margin-left: 70%" >Выйти</a>
<div class="table">
<table id="myTable" align="center" style="width: 60%; margin-left: 19%" border="1px" class="tablesorter table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Кому</th>
        <th scope="col">Тема</th>
        <th scope="col">Текст</th>
        <th scope="col">Дата</th>
    </tr>
    </thead>

    <form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php" id = 'del'>
    <tbody>
    <? foreach ($form as $item): ?>
        <tr>
            <td style="width: 10px"><input type="checkbox" name="<?= $item['id']?>" value="<?= $item['id']?>"></td>
            <td style="width: 25%"><?= $item['toEmail']?></td>
            <td><?= $item['subject']?></td>
            <td><?= $item['text']?></td>
            <td><?= $item['create_date']?></td>
        </tr>
    <? endforeach;?>
    </form>
    </tbody>

</table>
</div>
<button type="submit" class="btn btn-warning" name="del" style="margin-left: 45%" value="Удалить" form="del">Удалить</button>

<h1 сlass="display-3" style="margin-left: 31%">Mail</h1>
<div class="col-md-4 col-md-offset-5" style="margin-left: 30%">
    <form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php">
        <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Тема:</label>
                <input type="text" name="name" value="<?= $_POST['name'] ?? ''?>" class="form-control" placeholder="Тема">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="text" name="email" value="<?= $_POST['email'] ?? ''?>" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Сообщение</label>
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3">
                    <?= $_POST['message'] ?? '' ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-success" name="send" value="Отправить" style="margin-left: 50%">Отправить</button>
    </form>
</div>

</body>
</html>
