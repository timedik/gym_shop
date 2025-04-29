<?php
session_start();
require_once('connect.php');

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Проверяем, существует ли товар в таблице products
    $stmt_check = $connect->prepare("SELECT 1 FROM products WHERE id = ?");
    $stmt_check->bind_param("i", $product_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows === 0) {
        echo "Ошибка: товар с таким ID не найден.";
        exit;
    }

    $session_id = session_id();

    // Проверяем, есть ли уже товар в корзине
    $stmt_check_cart = $connect->prepare("SELECT quantity FROM cart WHERE session_id = ? AND product_id = ?");
    $stmt_check_cart->bind_param("si", $session_id, $product_id);
    $stmt_check_cart->execute();
    $result = $stmt_check_cart->get_result();

    if ($result->num_rows > 0) {
        // Увеличиваем количество
        $stmt_update = $connect->prepare("UPDATE cart SET quantity = quantity + 1 WHERE session_id = ? AND product_id = ?");
        $stmt_update->bind_param("si", $session_id, $product_id);
        $stmt_update->execute();
    } else {
        // Добавляем новую запись
        $stmt_insert = $connect->prepare("INSERT INTO cart (session_id, product_id, quantity) VALUES (?, ?, 1)");
        $stmt_insert->bind_param("si", $session_id, $product_id);
        $stmt_insert->execute();
    }

    // Перенаправление назад
    header("Location: index.php");
    exit;
} else {
    echo "Ошибка: ID товара не передан.";
}
