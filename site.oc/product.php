<?php
require_once("connect.php");

$title = "Товар | GymBoss";
require_once(__DIR__ . "/header.php");

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "<p>Ошибка: неверный ID товара.</p>";
    require_once(__DIR__ . "/footer.php");
    exit;
}

$id = $connect->real_escape_string($_GET["id"]);
$sql = "SELECT * FROM products WHERE id = $id";
$result = $connect->query($sql);

if (!$result || $result->num_rows === 0) {
    echo "<p>Товар не найден.</p>";
    require_once(__DIR__ . "/footer.php");
    exit;
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> | GymBoss</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            font-family: 'Montserrat', 'Poppins', 'Roboto', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #fef8f5;
            color: #333;
        }

        .page-content {
            flex: 1 0 auto;
            padding: 20px;
        }

        .wrapper {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .wrapper h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .product-page {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            align-items: flex-start;
        }

        .product-page img {
            width: 300px;
            max-width: 100%;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #f1c40f;
        }

        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .product-page-name {
            font-size: 1.8rem;
            font-weight: 600;
            color: #e67e22;
        }

        .product-page-sale {
            font-size: 1.6rem;
            font-weight: bold;
            color: #c0392b;
        }

        .product-page-price {
            font-size: 1.2rem;
            color: #7f8c8d;
        }

        .product-page-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #34495e;
        }

        .product-rating {
            font-size: 0.95rem;
            color: #555;
            display: flex;
            align-items: center;
        }

        .product-rating .stars {
            color: #f39c12;
            border-radius: 10px;
            margin-right: 8px;
        }
        .product-podrobnee {
            border-radius: 10px;
        }

        .buy-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #27ae60;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            width: 100%;
            max-width: 250px;
        }

        .buy-button:hover {
            background-color: #1e8449;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            text-align: center;
            text-decoration: none;
            max-width: 250px;
        }

        .back-button:hover {
            background-color: #2c80b4;
        }

        footer {
            flex-shrink: 0;
            background-color: #2980b9;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .product-page {
                flex-direction: column;
                align-items: center;
            }

            .product-info {
                width: 100%;
                text-align: center;
                align-items: center;
            }

            .buy-button,
            .back-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="page-content">
        <main>
            <div class="wrapper">
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <div class="product-page">
                    <img src="localhost/sites/site.oc/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="product-info">
                        <p class="product-page-sale"><?= htmlspecialchars($product['sale']) ?> ₽</p>
                        <p class="product-page-name"><?= htmlspecialchars($product['name']) ?></p>
                        <?php if(isset($product['price']) && $product['price']): ?>
                            <p class="product-page-price"><s><?= htmlspecialchars($product['price']) ?> ₽</s></p>
                        <?php endif; ?>
                        <p class="product-page-description"><?= htmlspecialchars($product['description']) ?></p>

                        <div class="product-rating">
                            <span class="stars">★★★★★</span>
                            <span>(123 отзыва)</span>
                        </div>

                        <button class="buy-button">Купить</button>
                        <!-- Кнопка "Назад" — только на этой странице -->
                        <a href="index.php" class="back-button">← Назад</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php require_once(__DIR__ . "/footer.php"); ?>
</body>
</html>
