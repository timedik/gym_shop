<?php
$hostname = "localhost"; // На Timeweb всегда localhost
$username = "cj37909_root"; // ← имя пользователя из панели
$password = "123123";   // ← пароль от БД
$database = "gym_shop";   // ← имя БД из панели

$connect = new mysqli($hostname, $username, $password, $database);

if ($connect->connect_error) {
    die("Ошибка подключения: " . $connect->connect_error);
}
$connect->set_charset("utf8"); // Рекомендуется для корректной кодировки
?>