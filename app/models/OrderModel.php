<?php

namespace Models;
use Database\MySQLConnection;
use PDO;

class OrderModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MySQLConnection::getInstance();
    }

    public function getAllOrders()
    {
        $statement = $this->pdo->prepare("SELECT * FROM `order`");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrdersForUser($userId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `order` WHERE user_id = ?");
        $statement->execute([$userId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($orderId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `order` WHERE id = ?");
        $statement->execute([$orderId]);
        return $statement->fetch();
    }

    public function createOrder($data) {
        $statement = $this->pdo->prepare("INSERT INTO `order` (user_id, description, full_price) VALUES (?, ?, ?)");
        $statement->execute([$data['user_id'], $data['description'], $data['full_price']]);
        return $this->pdo->lastInsertId();
    }

}