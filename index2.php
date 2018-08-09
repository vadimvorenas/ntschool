<?php
//class Aer
//{
//    public function __construct()
//    {
//        $db = new \PDO("mysql:host=127.0.0.1;port=3306;dbname=php1course;charset=utf8", 'mysql', 'mysql');
//        var_dump($db);
//        $sql = sprintf("SELECT * FROM %s WHERE id = :id ", 'users');
//        $sql = "SELECT * FROM `articles` ";
//        $query = $db->query($sql);
////        $a = 'vadya';
//
////        $query->bindParam(':id', $a);
//
//        try {
//            return  (($query->execute()));
//        } catch
//        (\Exception $exception) {
//            echo $exception;
//        }
//    }
//}
//var_dump( $a = new Aer());



$db = new \PDO("mysql:host=127.0.0.1;dbname=php1course", 'mysql', 'mysql');
$smtp = $db->query(sprintf("SELECT * FROM `%s` WHERE id = '3' ", 'users'));

if ($smtp != false){
    $smtp = $smtp->fetchAll();
}
var_dump(empty($smtp));






