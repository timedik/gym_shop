<?php
session_start();
require_once('connect.php');

if (isset($_POST['customer_name']) && isset($_POST['customer_phone'])) {
    $session_id = session_id();
    $name = trim($_POST['customer_name']);
    $phone = trim($_POST['customer_phone']);

    $sql = "SELECT c.product_id, c.quantity, p.sale 
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

    if (count($items) === 0) {
        echo "Ваша корзина пуста.";
        exit;
    }

    $stmt = $connect->prepare("INSERT INTO orders (session_id, customer_name, customer_phone, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $session_id, $name, $phone, $total);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    $stmt_items = $connect->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($items as $item) {
        $stmt_items->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['sale']);
        $stmt_items->execute();
    }

    $stmt_clear = $connect->prepare("DELETE FROM cart WHERE session_id = ?");
    $stmt_clear->bind_param("s", $session_id);
    $stmt_clear->execute();

    // HTML и стили
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Спасибо за заказ</title>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: #f4f6f8;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .thank-you-box {
                background: #ffffff;
                padding: 40px;
                max-width: 500px;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                border-radius: 12px;
            }
            .thank-you-box h2 {
                color: #27ae60;
                margin-bottom: 15px;
            }
            .thank-you-box p {
                font-size: 16px;
                color: #555;
                margin: 10px 0;
            }
            .thank-you-box a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #2980b9;
                color: white;
                text-decoration: none;
                border-radius: 6px;
                transition: background-color 0.3s;
            }
            .thank-you-box a:hover {
                background-color: #1f6391;
            }
        </style>
    </head>
    <body>
        <div class="thank-you-box">
            <h2>Спасибо за заказ, <?= htmlspecialchars($name) ?>!</h2>
            <p>Мы свяжемся с вами по телефону: <strong><?= htmlspecialchars($phone) ?></strong></p>
            <p><strong>Сумма заказа:</strong> <?= number_format($total, 2, ',', ' ') ?> ₽</p>
            <a href="inx2.php">Вернуться на главную</a>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Ошибка: не все поля заполнены.";
}
?>
