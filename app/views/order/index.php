<?php //var_dump($orders)?>
<?php //foreach ($orders as &$order): ?>
<?php //var_dump($order); ?>
<?php //endforeach; die()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <script src="js/app.js"></script>
</head>
<body>
<h1>Orders</h1>
<table id="orderTable" border="1px" ">
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
<!--    --><?php //foreach ($orders as $order) {?>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td>
                <a href="/?controller=order&action=order&id=<?= $order['id']; ?>">
                <?= $order['id']; ?>
                </a>
            </td>
            <td>
                <a href="/?controller=user&action=user&id=<?= $order['user_id']; ?>">
                    <?= $order['user_id']; ?>
                </a>
            </td>
            <td>
                <a href="/?controller=user&action=user&id=<?= $order['user_id']; ?>">
                    <?= $users[$order['user_id'] - 1]['full_name']; ?>
<!--                    --><?php //= $order['user_full_name']; ?>
                </a>
            </td>
            <td><?= $order['description']; ?></td>
            <td><?= $order['full_price']; ?></td>
            <td><?= $order['paid_amount']; ?></td>
            <td><?= $order['outstanding_amount']; ?></td>
        </tr>
<!--    --><?php //} ?>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="background-color:  #e9e6e6"></th>
            <th style="background-color:  #e9e6e6"></th>
            <th style="background-color:  #e9e6e6"></th>
            <th style="background-color:  #e9e6e6"></th>
            <th>Total Full price:</th>
            <th>Total Paid Amount:</th>
            <th>Total Outstanding amount:</th>
        </tr>
        <tr>
            <td style="background-color:  #e9e6e6"></td>
            <td style="background-color:  #e9e6e6"></td>
            <td style="background-color:  #e9e6e6"></td>
            <td style="background-color:  #e9e6e6"></td>
            <td id="totalFullPrice"></td>
            <td id="totalPaid"></td>
            <td id="totalOutstanding"></td>
        </tr>
    </tfoot>
</table>
<!--<button id="addOrder">Add Order</button>-->

<span>
    <br>
</span>

<label for="orderForm">Add new order: <br>
</label>
<br>
<form id="orderForm">
    <label for="user_id">User ID:</label>
    <select id="userDropdown">
        <?php foreach ($users as $user): ?>
            echo "<option value=<?= $user['id']; ?>>"<?= $user['full_name']; ?>"</option>";
        <?php endforeach; ?>
    </select>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>
    <label for="full_price">Full Price:</label>
<!--    <input type="text" id="full_price" name="full_price" required>-->
    <input type="number" id="full_price" name="full_price" step="0.01" required>
    <button id="submitOrder" type="submit">Create Order</button>
</form>

<span>
    <br>
</span>

<div>
    <a href="/?controller=user&action=index">
        >>> Users list
    </a>
</div>



</body>
</html>
