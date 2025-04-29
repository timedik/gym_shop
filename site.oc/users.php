<?php
// Подключение к БД и вывод списка пользователей
$db = new PDO("mysql:host=localhost;dbname=marketplace", "root", "");
$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Роль</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['role'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>