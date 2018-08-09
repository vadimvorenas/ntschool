<?php
class Aer
{
    public function __construct()
    {

        mysqli_connect("mysql:host=127.0.0.1; dbname=php1course", 'mysql','mysql');
       echo mysqli_query("SELECT * FROM `articles` ");
        $db = new \PDO("mysql:host=127.0.0.1; dbname=php1course", 'mysql', 'mysql');
        $db->exec('SET NAMES UTF8');
        var_dump($db);
        $sql = sprintf("SELECT * FROM %s WHERE id = :id ", 'users');
        $sql = "SELECT * FROM `articles` ";
        $query = $db->prepare($sql);
//        $a = 'vadya';

//        $query->bindParam(':id', $a);

        try {
            var_dump(($query->execute()));
        } catch
        (\Exception $exception) {
            echo $exception;
        }
    }
}
$a = new Aer();
?>

<!--<!DOCTYPE html>
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
</html>-->
