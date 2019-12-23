<?php

require 'db.php';

if (isset($_POST)) {
    $id = $_POST['id'];

    $data = $db->prepare('UPDATE posts SET title = ?, description = ? WHERE id = ?');
    $data->execute([
        $_POST['title'],
        $_POST['description'],
        $id
    ]);

    header("Location: index.php?id=$id");
    die();
}
