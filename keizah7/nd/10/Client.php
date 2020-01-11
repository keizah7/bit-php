<?php

class Client
{
    private $db;

    function __construct($connection)
    {
        $this->db = $connection;
    }

    public function create(array $data)
    {
        $acc = $this->db->prepare('INSERT INTO clients (firstname, lastname) VALUES (?, ?)');
        $acc->execute($data);

        $this->id = $this->db->lastInsertId();


        return $acc->fetch();
    }

    public function lastId()
    {
        return $this->db->lastInsertId();
    }

    // public function all()
    // {
    //     return $this->db->query('SELECT * FROM accounts ORDER BY lastname ASC');
    // }

    // public function getById(int $int)
    // {
    //     $acc = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');
    //     $acc->execute([$int]);

    //     return $acc->fetch();
    // }


    // public function getByFirstNameAndLastname(array $data)
    // {
    //     $acc = $this->db->prepare('SELECT * FROM accounts WHERE firstname = ? AND lastname = ?');
    //     $acc->execute($data);

    //     return $acc->fetch();
    // }
}
