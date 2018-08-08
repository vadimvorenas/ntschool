<?php

session_start();
$_SESSION['auth'] = false;
setcookie('login', 0, time() - 3600*24*365);
setcookie('pass', 0, time() - 3600*24*365);

header("location:index.php");