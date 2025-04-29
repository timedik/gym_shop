<?php
session_start();
require_once('connect.php');

$session_id = session_id();

// Получаем товары из корзины
$sql = "SELECT p.name, p.sale, c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.session_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $items[] = $row;
    $total += $row['sale'] * $row['quantity'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .order-summary { margin-bottom: 20px; }
        .order-summary table { width: 100%; border-collapse: collapse; }
        .order-summary th, .order-summary td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        form { max-width: 400px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="tel"] {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        button {
            margin-top: 20px; padding: 10px 20px;
            background-color: #27ae60; color: #fff;
            border: none; cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Оформление заказа</h2>

<?php if (count($items) === 0): ?>
    <p>Ваша корзина пуста.</p>
<?php else: ?>
    <div class="order-summary">
        <h3>Ваш заказ:</h3>
        <table>
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= $item['sale'] ?> ₽</td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= $item['sale'] * $item['quantity'] ?> ₽</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Итого:</strong></td>
                    <td><strong><?= $total ?> ₽</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="process_order.php" method="post">
        <h3>Контактные данные:</h3>
        <label>Имя:
            <input type="text" name="customer_name" required>
        </label>
        <label>Телефон:
            <input type="tel" name="customer_phone" required>
        </label>
        <button type="submit">Подтвердить заказ</button>
    </form>
<?php endif; ?>

</body>
</html>
