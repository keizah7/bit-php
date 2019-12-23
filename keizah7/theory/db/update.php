<?php

require 'db.php';

if (isset($_POST)) {

    $data = $db->prepare('UPDATE posts SET title = ?, description = ? WHERE id = ?');
    $data->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['id']
    ]);

    $id = $_POST['id'];
    header("Location: index.php?id=$id");
    die();
}
