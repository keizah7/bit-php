<?php
$host = '127.0.0.1';
$db   = 'qqq';
$user = 'root';
$pass = '123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$sql = "CREATE TABLE IF NOT EXISTS CUSTOMERS(
    ID   INT              NOT NULL,
    NAME VARCHAR (20)     NOT NULL,
    AGE  INT              NOT NULL,
    ADDRESS  CHAR (25) ,
    SALARY   DECIMAL (18, 2),       
    PRIMARY KEY (ID)
 );"; //sql kalba

$stmt = $pdo->query($sql);


