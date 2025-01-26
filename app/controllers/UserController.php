<?php

namespace Controllers;
use Models\UserModel;
use Models\OrderModel;

class UserController {
    private $userModel;
    private $orderModel;
    public function __construct() {
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once '../views/user/index.php';
    }

    public function user_by_id($id) {
        $user = $this->userModel->getUserById($id);
        $userOrders = $this->orderModel->getOrdersForUser($id);

        $full = 0;
        $paid = 0;
        $out = 0;

        foreach ($userOrders as $order) {
            $full += floatval($order["full_price"]);
            $paid += floatval($order["paid_amount"]);
            $out += floatval($order["outstanding_amount"]);
        }

        $user["sum_full"] = $full;
        $user["sum_paid"] = $paid;
        $user["sum_out"] = $out;

//        var_dump($userOrders);
//        var_dump($user);
//        die();

        require_once '../views/user/user.php';
    }
}