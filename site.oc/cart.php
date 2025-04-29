<?php
session_start();
require_once("connect.php");

// Исправлено создание объекта Cart
$cart = new ($connect);

$title = "Корзина | GymBoss";
require_once(__DIR__ . "/header.php");

// Получаем товары в корзине
$session_id = session_id();
$sql = "SELECT p.*, c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.session_id = '$session_id'";
$result = $connect->query($sql);

// Удаляем ненужный второй запрос (он конфликтует с первым)
// $id = $connect->real_escape_string($_GET["id"]);
// $sql = "SELECT * FROM products WHERE id = $id";
// $result = $connect->query($sql);

// Рассчитываем общую сумму
$total = 0;
if ($result && $result->num_rows > 0) {
    while ($item = $result->fetch_assoc()) {
        $total += $item['sale'] * $item['quantity'];
    }
    // Сбрасываем указатель результата для повторного использования
    $result->data_seek(0);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
   .cart-wrapper {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fdfdfd;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f8f8f8;
    color: #333;
    font-weight: 600;
}

input[type="number"] {
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    padding: 6px 12px;
    background-color: #2980b9;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: 0.3s;
}

button[type="submit"]:hover {
    background-color: #1c5f8a;
}

a.checkout-button {
    display: inline-block;
    padding: 12px 24px;
    background-color: #27ae60;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
    transition: background-color 0.3s;
}

a.checkout-button:hover {
    background-color: #219955;
}

.cart-total {
    text-align: right;
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="page-content">
        <main>
            <div class="wrapper">
                <h2>Ваша корзина</h2>
                
                <?php if ($result && $result->num_rows > 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Сумма</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($item = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['name']) ?></td>
                                    <td><?= htmlspecialchars($item['sale']) ?> ₽</td>
                                    <td>
                                        <form method="post" action="update_cart.php">
                                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" style="width: 60px;">
                                            <button type="submit">Обновить</button>
                                        </form>
                                    </td>
                                    <td><?= htmlspecialchars($item['sale'] * $item['quantity']) ?> ₽</td>
                                    <td>
                                        <a href="remove_from_cart.php?id=<?= $item['id'] ?>" onclick="return confirm('Удалить товар из корзины?')">Удалить</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                    <div class="cart-total">
                        <p>Итого: <?= $total ?> ₽</p>
                        <a href="checkout.php" class="checkout-button">Оформить заказ</a>
                    </div>
                <?php else: ?>
                    <p>Ваша корзина пуста.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?php require_once(__DIR__ . "/footer.php"); ?>
</body>
</html>