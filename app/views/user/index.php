<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <script src="js/app.js"></script>
</head>
<body>
<h1>Users</h1>
<table id="userTable" border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
    </tr>
    </thead>
    <tbody>
    <!-- PHP logic to fetch users from the database -->
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td>
                <a href="/?controller=user&action=user&id=<?= $user['id']; ?>">
                    <?= $user['full_name']; ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<button id="addUser">Add User</button>
<div>
    <a href="/?controller=order&action=index">
        >>> Orders list
    </a>
</div>
</body>
</html>