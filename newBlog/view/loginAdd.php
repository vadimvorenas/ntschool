<!DOCTYPE html>
<html lang="en">
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post">
    <div>
        Login<br>
       <input type="text" id="lname" name="lastname" placeholder="Your Login..">
    
        Password<br>
        <input type="text" id="lname" name="lastname" placeholder="Your Password..">
    
        Password Confirmation<br>
        <input type="text" id="lname" name="lastname" placeholder="Password Confirmation..">
    </div>
    <br>Запомнить меня
    <input type="checkbox" name="saveMe">
    <input type="submit" value="Ok">
</form>
<?php echo $msg; ?>
</body>
</html>