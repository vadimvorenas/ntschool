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


</head>
<body>
<a href="/Blog/Laravel/test_ITmaster/my/view/logout.php">Выйти</a>
<table id="myTable" align="center" width="90%" border="1px" class="tablesorter">
    <thead>
    <tr>
        <th>Отметить</th>
        <th>Кому</th>
        <th>Тема</th>
        <th>Текст</th>
        <th>Дата</th>
    </tr>
    </thead>

    <form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php" id = 'del'>
    <tbody>
    <? foreach ($form as $item): ?>
        <tr>
            <td><input type="checkbox" name="<?= $item['id']?>" value="<?= $item['id']?>"></td>
            <td><?= $item['toEmail']?></td>
            <td><?= $item['subject']?></td>
            <td><?= $item['text']?></td>
            <td><?= $item['create_date']?></td>
        </tr>
    <? endforeach;?>
    </form>
    </tbody>

</table>
<input type="submit" name="del" value="Удалить" form="del">

<h1>Mail</h1>
<form method="post" action="/Blog/Laravel/test_ITmaster/my/index.php">
    <p>Тема:</p>
    <input type="text" name="name" value="<?= $_POST['name'] ?? ''?>">
    <p>Кому:</p>
    <input type="text" name="email" value="<?= $_POST['email'] ?? ''?>">
    <p>Сообщение:</p>
    <textarea name="message"><?= $_POST['message'] ?? '' ?></textarea>
    <br>
    <input type="submit" name="send" value="Отправить">
</form>

</body>
</html>
