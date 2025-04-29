<?php
session_start();
require_once("connect.php");

$session_id = session_id();
$product_id = (int)$_GET['id'];

$sql = "DELETE FROM cart WHERE session_id = ? AND product_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("si", $session_id, $product_id);
$stmt->execute();

header("Location: cart.php");
exit;
?>
