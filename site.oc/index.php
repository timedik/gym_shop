<?php
require_once('./connect.php');
$sql = "SELECT * FROM `products`";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBoss</title>
    <!-- Подключение шрифта Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Подключение Font Awesome для иконок -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            background-image: url('https://img.freepik.com/free-photo/attractive-man-white-opened-shirt-with-weight-bag-his-shouders-is-posing-photographer_613910-14985.jpg?t=st=1745923169~exp=1745926769~hmac=6bab3a217e341a45eaea49bf9e7a5d402ccf07bd509859678d843c2a96438ec5&w=900');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
        }

        header {
            background-color: #2980b9;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            transition: transform 0.3s;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        .logo-text {
            color: white;
            font-weight: 600;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.3s;
            position: relative;
        }

        .nav-link i {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .nav-link:hover {
            color: #ffd700;
            transform: translateY(-3px);
        }

        .cart-icon {
            position: relative;
        }

        .cart-counter {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .hero-image {
            display: flex;
            max-width: 100%;
            height: 400px;
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
        }

        .hero-image img {
            width: 100%;
            display: flex;
            bac
        }

        @keyframes sparkle {
            0% { filter: brightness(100%); }
            50% { filter: brightness(120%); }
            100% { filter: brightness(100%); }
        }

        .anime-hero:hover {
            animation: sparkle 2s infinite;
        }

        @media (max-width: 768px) {
            .anime-hero {
                height: 50vh;
            }
        }

        .mobile-menu-btn {
            display: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        @media (max-width: 768px) {
            .header-nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background-color: #2980b9;
                flex-direction: column;
                gap: 20px;
                padding: 20px 0;
                transition: left 0.3s;
            }

            .header-nav.active {
                left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .nav-link {
                padding: 10px 0;
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .nav-link:hover i {
            animation: pulse 0.5s ease-in-out;
        }

        main {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 100px;
            justify-content: center;
            margin-top: 20px;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.2s ease;
        }

        .product-image img:hover {
            transform: scale(1.2);
        }

        .product-info h2 {
            font-size: 20px;
            margin: 15px 0;
            font-weight: 600;
        }

        .product-price {
            font-size: 18px;
            color: #e74c3c;
            margin-bottom: 10px;
        }

        .old-price {
            text-decoration: line-through;
            color: #aaa;
            margin-right: 10px;
        }

        .new-price {
            font-weight: bold;
        }

        .product-stars {
            margin-top: 10px;
        }

        .product-stars span {
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .product-stars span:hover {
            color: gold;
        }

        .add-to-cart {
            padding: 12px 20px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .add-to-cart:hover {
            background-color: #219955;
        }

        .cart-count {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 18px;
        }

        @media (max-width: 1200px) {
            .product-card {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .product-card {
                width: 100%;
            }
        }

        footer {
            background-color: #2980b9;
            color: #fff;
            padding: 30px 0 10px;
            margin-top: 50px;
            width: 100%;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 15px;
            text-align: center;
        }

        .footer-section i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #fff;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .footer-section p {
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
            }

            .footer-section {
                margin-bottom: 25px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="icon.jpg" alt="Логотип GymBoss" class="logo-img">
        <span class="logo-text">GymBoss</span>
    </div>
    <nav class="header-nav">
        <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Главная</a>
        <a href="vhod.php" class="nav-link"><i class="fas fa-shopping-bag"></i> Регистрация</a>
        <a href="lc.php" class="nav-link"><i class="fas fa-user"></i> Кабинет</a>
        <a href="cart.php" class="nav-link cart-icon">
            <i class="fas fa-shopping-cart"></i> Корзина
            <span class="cart-counter">0</span>
        </a>
    </nav>
</header>
<main>
<div class="hero-image">
    <img src ="poshel.jpg" alt="Главное фото" class="hero-image">
</div>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="product-card">
            <div class="product-image">
                <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>">
            </div>
            <div class="product-info">
                <h2><?= htmlspecialchars($row['name']) ?></h2>
                <div class="product-price">
                    <span class="old-price"><?= $row['price'] ?> ₽</span>
                    <span class="new-price"><?= $row['sale'] ?> ₽</span>
                </div>
                <div class="product-stars">
                    <span>⭐⭐⭐☆☆</span>
                </div>
                <a href="product.php?id=<?= $row['id'] ?>" class="add-to-cart">Подробнее</a>
                </div>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['name']) ?>">
                    <input type="hidden" name="product_price" value="<?= $row['sale'] ?>">
                    <button type="submit" class="add-to-cart">Добавить в корзину</button>
                </form>
            </div>
        </div>
    <?php } ?>
</main>
<footer>
    <div class="footer-content">
        <div class="footer-section">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Контакты</h3>
            <p>г. Москва, ул. Ленина, 1</p>
        </div>
        <div class="footer-section">
            <i class="fas fa-phone"></i>
            <h3>Телефон</h3>
            <p>+7 999 999 99 99</p>
        </div>
        <div class="footer-section">
            <i class="fas fa-envelope"></i>
            <h3>Email</h3>
            <p>info@gymboss.ru</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 GymBoss. Все права защищены.</p>
    </div>
</footer>
</body>
</html>
