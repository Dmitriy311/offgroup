<?php

namespace Models;
use Database\MySQLConnection;
use PDO;

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MySQLConnection::getInstance();
    }

    public function getAllUsers()
    {
        $statement = $this->pdo->prepare("SELECT * FROM `user`");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch();
    }

}
