<?php

class Bankas
{
    public static function addAccount($post)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "INSERT INTO users (firstname, lastname) VALUES (?, ?)"; // pasirasome uzklausa
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute( [ 
            $post['firstname'], 
            $post['lastname']
        ] );

    }

    public static function allAccounts($post)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute();// vykdome uzklausa. steitmente pasilieka rezultatai
        return $stmt->fetchAll(); //isimame rezultatus is steitmento
    }

    public static function getUser($id)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        return $stmt->fetch(); //isimame rezultatus is steitmento
    }

    public static function addAmmount($post, $id)
    {
        $user = self::getUser($id);
        $now = $user['amount'];
        
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "UPDATE users SET amount = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$now+$post['amount'], $id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        
    }
}