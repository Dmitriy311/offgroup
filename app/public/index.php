<?php
use Controllers\UserController;
use Controllers\OrderController;
include '../vendor/autoload.php';

// ...So nobody get lost
$start = <<<EOF

<div>
    <a href="/?controller=order&action=index">
        >>> Get started! <<<
    </a>
</div>

EOF;

$controller = '';
$action = '';

// Simple routing based on URL parameters
if (isset($_GET['controller']) && isset($_GET['action']) && $_GET['controller'] !== '' && $_GET['action'] !== '') {
    $controller = htmlspecialchars($_GET['controller']);
    $action = htmlspecialchars($_GET['action']);
} else {
    echo $start;
    die("You must select controller and action.");
}
isset($_GET['id']) ? $id = htmlspecialchars($_GET['id']) : $id = '';

if ($controller == 'user') {

    $userController = new UserController();

    if ($action == 'index') {
        $userController->index(); // List all users
    } elseif ($action == 'user' && isset($_GET['id'])) {
        $userController->user_by_id($id); // Show user data
    } else {
        echo "Action does not exist.";
        die();
    }

} elseif ($controller == 'order') {

    $orderController = new OrderController();

    if ($action == 'index') {
        $orderController->index(); // List all orders
    } elseif ($action == 'user_orders' && isset($_GET['id'])) {
        $orderController->user_orders($id); // List user's orders
    } elseif ($action == 'order' && isset($_GET['id'])) {
        $orderController->order_by_id($id); // Show order data
    } elseif ($action == 'submit') {
        $orderController->submit(); // Call ajax handler
    } else {
        echo "Action does not exist.";
        die();
    }

} else {
    echo "Controller does not exist.";
    die();
}