<?php

class Mysql
{
    private static $PDO; // PDO objektas

    public static function db() 
    {
        if (self::$PDO) {
            return self::$PDO;
        }
        $host = 'localhost';
        $db   = 'bankas';
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
            return self::$PDO = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}