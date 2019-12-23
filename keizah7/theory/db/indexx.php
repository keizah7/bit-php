<?php

require 'db.php';


try {
    $sql = "INSERT INTO posts VALUES (?, ?)";

    $insert = $db->prepare($sql);
    $insert->execute(['asd', 'tesdasdsdasd']);
} catch (PDOException $th) {
    echo $th->getMessage();
}

$sql = 'SELECT * FROM posts';
$select = $db->prepare($sql);
$select->execute();

$posts = $select->fetchAll();


foreach ($posts as $value) {
    echo $value['title'] . ' ' . $value['description'];
    echo '<br><br>';
}

$db = null;
