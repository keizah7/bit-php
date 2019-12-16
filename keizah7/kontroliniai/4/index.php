<?php

// h1 pradinis skaicius prie jo pridedama suma is input

session_start();

if(!isset($_SESSION['suma'])) $_SESSION['suma'] = 0;
if(isset($_POST['number'])) $_SESSION['suma']   += (int) $_POST['number'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?=$_SESSION['suma']?></h1>

    <form action="/bit-php/keizah7/kontroliniai/4/" method="post">
        <input type="number" name="number" value="0">
        <input type="submit" value="+">
    </form>
</body>
</html>