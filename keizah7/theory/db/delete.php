<?php

require 'db.php';

if (isset($_GET)) {
    $data = $db->prepare('DELETE FROM posts WHERE id = ?');
    $data->execute([$_GET['id']]);

    header("Location: index.php");
    die();
}
