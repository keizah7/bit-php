<?php

$dsn = 'mysql:host=localhost;dbname=blogas;charset=utf8';
$user = 'keizah';
$pass = 'laravel';
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
