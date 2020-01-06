<?php

require 'Mysql.php';


$pdo = Mysql::db();

$sql = "DROP TABLE IF EXISTS accounts";
$pdo->query($sql);

$sql = "DROP TABLE IF EXISTS users";
$pdo->query($sql);




$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
personalcode CHAR(11) NOT NULL UNIQUE
)";
$pdo->query($sql);



$sql = "CREATE TABLE accounts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2) DEFAULT 0,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";
$pdo->query($sql);