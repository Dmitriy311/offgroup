<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User #<?= $user['id']; ?></title>
    <script src="js/app.js"></script>
</head>
<body>
<h1><?= htmlspecialchars($user['full_name']); ?></h1>
<table id="userTable" border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Total Full on all orders:</th>
        <th>Total Paid on all orders:</th>
        <th>Total Outstanding on all orders:</th>
        <th>Orders</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['full_name']; ?></td>
            <td><?= $user['sum_full']; ?></td>
            <td><?= $user['sum_paid']; ?></td>
            <td><?= $user['sum_out']; ?></td>
            <td>
                <? foreach ($userOrders as $order):  ?>

                    <a href="/?controller=order&action=order&id=<?= $order['id']; ?>">
                        <?= $order['id']; ?>
                    </a>

                <? endforeach; ?>
            </td>
        </tr>
    </tbody>
</table>
<div>
    <a href="/?controller=user&action=index">
        >>>Back to users list
    </a>
</div>
<div>
    <a href="/?controller=order&action=index">
        >>>Back to orders list
    </a>
</div>
</body>
</html>