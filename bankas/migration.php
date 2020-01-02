<?php

require 'Mysql.php';


$pdo = Mysql::db();



// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) DEFAULT 0
)";

$pdo->query($sql);