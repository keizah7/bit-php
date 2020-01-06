<?php

class Bankas
{
    public static function addUser($post)
    {
        $pdo = Mysql::db(); // gauname duomenu baze

        //TIKRINAME asmens koda
        $sql = "SELECT * FROM users WHERE personalcode = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$post['personalcode']]);// vykdome uzklausa. steitmente pasilieka rezultatai
        $user =  $stmt->fetch(); //isimame rezultatus is steitmento

        if ($user) {
            $_SESSION['message'] = 'Tokis vartotojas jau egzistuoja musu graziajame banke.';
            return;
        }


        $sql = "INSERT INTO users (firstname, lastname, personalcode) VALUES (?, ?, ?)"; // pasirasome uzklausa
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute( [ 
            $post['firstname'], 
            $post['lastname'],
            $post['personalcode']
        ] );

    }
    
    public static function addAccount($post, $id)
    {
       
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "INSERT INTO accounts (user_id) VALUES (?)"; // pasirasome uzklausa
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        
    }

    public static function allUsers($post)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute();// vykdome uzklausa. steitmente pasilieka rezultatai
        return $stmt->fetchAll(); //isimame rezultatus is steitmento
    }

    public static function allAccounts($post, $id)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "SELECT * FROM accounts WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$id]);// vykdome uzklausa. steitmente pasilieka rezultatai
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
        $account = self::getAccount($id);
        $now = $account['amount'];
        
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "UPDATE accounts SET amount = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$now+$post['amount'], $id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        
    }


    public static function minusAmmount($post, $id)
    {
        $account = self::getAccount($id);
        $now = $account['amount'];

        if ($now < $post['amount']) {
            $_SESSION['message'] = 'Saskaitoje mazokai pinigu.';
            return;
        }
        
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "UPDATE accounts SET amount = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$now-$post['amount'], $id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        
    }


    public static function getAccount($id)
    {
        $pdo = Mysql::db(); // gauname duomenu baze
        $sql = "SELECT * FROM accounts WHERE id = ?";
        $stmt = $pdo->prepare($sql);// uzklausa pateikiame, bet nevykdome
        $stmt->execute([$id]);// vykdome uzklausa. steitmente pasilieka rezultatai
        return $stmt->fetch(); //isimame rezultatus is steitmento

    }
}