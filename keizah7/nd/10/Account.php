<?php

class Account
{
    private $db;

    function __construct($connection)
    {
        $this->db = $connection;
    }

    public function create(array $data)
    {
        $acc = $this->db->prepare('INSERT INTO accounts (firstname, lastname, amount) VALUES (?, ?, ?)');
        $acc->execute($data);

        return $acc->fetch();
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM accounts');
    }

    public function getById(int $int)
    {
        $acc = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');
        $acc->execute([$int]);

        return $acc->fetch();
    }


    public function getByFirstNameAndLastname(array $data)
    {
        $acc = $this->db->prepare('SELECT * FROM accounts WHERE firstname = ? AND lastname = ?');
        $acc->execute($data);

        return $acc->fetch();
    }
}
