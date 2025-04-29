<?php
session_start();
require_once("connect.php");

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: vhod.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Получение данных пользователя
$query = $connect->prepare("SELECT * FROM kabinet WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<p>Ошибка: пользователь не найден.</p>";
    exit;
}

$title = "Личный кабинет | GymBoss";
require_once(__DIR__ . "/header.php");
?>

<main class="main-content">
    <div class="profile-card">
        <h2>Привет, <?= htmlspecialchars($user['name']) ?>!</h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Роль:</strong> <?= htmlspecialchars($user['role'] ?? 'Пользователь') ?></p>

        <a href="logout.php" class="btn logout-btn">Выйти</a>
    </div>
</main>

<footer>
    &copy; <?= date('Y') ?> GymBoss. Все права защищены.
</footer>

</body>
</html>