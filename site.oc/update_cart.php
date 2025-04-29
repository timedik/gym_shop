<?php
session_start();
require_once('connect.php');

// Проверяем, что данные переданы
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    $session_id = session_id();

    // Если количество меньше 1 — удалим товар
    if ($quantity < 1) {
        $stmt = $connect->prepare("DELETE FROM cart WHERE session_id = ? AND product_id = ?");
        $stmt->bind_param("si", $session_id, $product_id);
        $stmt->execute();
    } else {
        // Обновим количество
        $stmt = $connect->prepare("UPDATE cart SET quantity = ? WHERE session_id = ? AND product_id = ?");
        $stmt->bind_param("isi", $quantity, $session_id, $product_id);
        $stmt->execute();
    }

    header("Location: cart.php");
    exit;
} else {
    echo "Ошибка: отсутствуют данные для обновления.";
}
