<?php
session_start();
require_once("connect.php");

$title = "Вход и регистрация | GymBoss";
require_once(__DIR__ . "/header.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Стили как в твоем коде */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #adadad;
            margin: 0;
            padding: 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            color: #fff;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .switch-form {
            text-align: center;
            margin-top: 15px;
        }

        .switch-form a {
            color: #3498db;
            text-decoration: none;
        }

        .switch-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<main>
    <div class="container">
        <h2 id="form-title">Вход</h2>

        <!-- Форма входа -->
        <form id="login-form" method="post" action="inx2.php">
            <div class="form-group">
                <input type="email" name="email" placeholder="Электронная почта" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
            <button type="submit">Войти</button>
        </form>

        <!-- Форма регистрации -->
        <form id="register-form" method="post" action="register.php" style="display: none;">
            <div class="form-group">
                <input type="text" name="name" placeholder="Имя" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Электронная почта" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>

        <!-- Переключение -->
        <div class="switch-form">
            <a href="#" id="switch-to-register">Создать аккаунт</a> |
            <a href="#" id="switch-to-login" style="display: none;">Уже есть аккаунт? Войти</a>
        </div>
    </div>
</main>

<script>
    const switchToRegister = document.getElementById('switch-to-register');
    const switchToLogin = document.getElementById('switch-to-login');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const formTitle = document.getElementById('form-title');

    switchToRegister.addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        formTitle.textContent = 'Регистрация';
        switchToRegister.style.display = 'none';
        switchToLogin.style.display = 'inline';
    });

    switchToLogin.addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        formTitle.textContent = 'Вход';
        switchToRegister.style.display = 'inline';
        switchToLogin.style.display = 'none';
    });
</script>

<?php require_once(__DIR__ . "/footer.php"); ?>
</body>
</html>
