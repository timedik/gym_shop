<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: inx2.php");
    exit();
}
?>

<h1>Админ-панель</h1>
<p>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['name']) ?>!</p>
