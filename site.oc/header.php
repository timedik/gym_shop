<?php
// ВАЖНО: никаких пробелов, пустых строк или символов ДО этого PHP-блока!
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "GymBoss" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Шрифты и иконки -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Минимальные стили для примера */
        body { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; }
        header, footer { background: #f4f4f4; padding: 15px; }
        .nav-link { margin-right: 10px; text-decoration: none; color: black; }
        .wrapper { padding: 20px; }
    </style>
        <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
     }

     body {
            font-family: 'Poppins', sans-serif;
            background-color: #adadad;
            color: #333;
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
    background-image: url(https://cdn4.iconfinder.com/data/icons/travel-and-hotel/512/gym_dumbell-1024.png)
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
}

@keyframes sparkle {
    0% { filter: brightness(100%); }
    50% { filter: brightness(120%); }
    100% { filter: brightness(100%); }
}

.anime-hero:hover {
    animation: sparkle 2s infinite; /* Мерцание, как у магической девочки! */
}
@media (max-width: 768px) {
    .anime-hero {
        height: 50vh; /* Чуть меньше, чтобы на телефоне было удобно */
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
    transition: transform 0.5s ease; /* Плавное увеличение при наведении */
}

/* Мобильная версия */
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

/* Анимация для иконок */
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
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-to-cart:hover {
            background-color: #2980b9;
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
        <img src="icon.jpg" alt="Логотип GymBoss" class="logo-img" style="height: 40px;">
        <span class="logo-text">GymBoss</span>
    </div>
    
    <nav class="header-nav">
        <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Главная</a>
        <a href="vhod.php" class="nav-link"><i class="fas fa-shopping-bag"></i> Регистрация</a>
        <a href="lc.php" class="nav-link"><i class="fas fa-user"></i> Кабинет</a>
        <a href="cart.php" class="nav-link cart-icon">
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="admin.php">Админка</a>
        <?php endif; ?>    
            <i class="fas fa-shopping-cart"></i> Корзина
            
            <span class="cart-counter">0</span>
        </a>
    </nav>
    
    <div class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
        
    </div>
</header>