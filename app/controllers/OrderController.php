<?php

namespace Controllers;
use Models\OrderModel;
use Models\UserModel;

class OrderController {
    private $orderModel;
    private $userModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
        $this->userModel = new UserModel();
    }

    public function index() {
        $orders = $this->orderModel->getAllOrders();
        $users = $this->userModel->getAllUsers();

        require_once '../views/order/index.php';
    }

    public function user_orders($userId)
    {
        $orders = $this->orderModel->getOrdersForUser($userId);
        require_once '../views/order/index.php';
    }

    public function order_by_id($orderId)
    {
        $order = $this->orderModel->getOrderById($orderId);
        $order['user_full_name'] = $this->userModel->getUserById($order['user_id'])['full_name']??'';
        require_once '../views/order/order.php';
    }

    public function submit() {
        require_once '../ajax/order_create.php';
    }
}