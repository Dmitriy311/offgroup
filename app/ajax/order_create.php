<?php

use Models\OrderModel;

$this->orderModel = new OrderModel();

$data = json_decode(file_get_contents("php://input"), true);

try {

    $res = $this->orderModel->createOrder($data);

} catch(Exception $e) {

    $log_start = date("Y-m-d H:i:s") . PHP_EOL;
    file_put_contents('/app/log/log.txt', $log_start, FILE_APPEND);

    $log_vars = "Input: " . print_r($data, true) . PHP_EOL;
    file_put_contents('/app/log/log.txt', $log_vars, FILE_APPEND);

    $log_error = "Error: " . $e->getMessage() . PHP_EOL;
    file_put_contents('/app/log/log.txt', $log_error, FILE_APPEND);

}
if ($res) {
    echo json_encode([
        'id' => $res,
        'user_id' => $data['user_id'],
        'user_full_name' => $data['user_full_name'],
        'description' => $data['description'],
        'full_price' => $data['full_price'],
        'message' => 'Order created successfully'
    ]);
} else {
    echo json_encode(['message' => 'Order creation failed']);
}