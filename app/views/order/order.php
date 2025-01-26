<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order #<?= $order['id']; ?></title>
    <script src="js/app.js"></script>
</head>
<body>
<h1>Order #<?= $order['id']; ?></h1>
<table id="orderTable" border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>User Full Name</th>
        <th>Description</th>
        <th>Full Price</th>
        <th>Paid Amount</th>
        <th>Outstanding Amount</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $order['id']; ?></td>
            <td>
                <a href="/?controller=user&action=user&id=<?= $order['user_id']; ?>">
                    <?= $order['user_id']; ?>
                </a>
            </td>
            <td>
                <a href="/?controller=user&action=user&id=<?= $order['user_id']; ?>">
                    <?= $order['user_full_name']; ?>
                </a>
            </td>
            <td><?= htmlspecialchars($order['description']); ?></td>
            <td><?= $order['full_price']; ?></td>
            <td><?= $order['paid_amount']; ?></td>
            <td><?= $order['outstanding_amount']; ?></td>
        </tr>
    </tbody>
</table>
<div>
    <a href="/?controller=order&action=index">
        >>>Back to orders list
    </a>
</div>
</body>
</html>