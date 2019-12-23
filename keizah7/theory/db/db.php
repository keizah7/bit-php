<?php

try {
    $dsn = 'mysql:host=localhost;dbname=blogas;charset=utf8';
    $username = 'keizah'; // 'root'
    $pass = 'laravel'; // ''
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $db = new PDO($dsn, $username, $pass, $options);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
