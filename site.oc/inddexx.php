<?php
require_once 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$productId = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> | GymBoss</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .product-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        
        .product-image {
            flex: 1;
            min-width: 300px;
        }
        
        .product-image img {
            width: 100%;
            border-radius: 8px;
        }
        
        .product-info {
            flex: 1;
            min-width: 300px;
        }
        
        .product-title {
            font-size: 28px;
            margin-bottom: 15px;
            color: #2980b9;
        }
        
        .product-price {
            font-size: 24px;
            margin: 20px 0;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #aaa;
            margin-right: 15px;
        }
        
        .new-price {
            color: #e74c3c;
            font-weight: bold;
        }
        
        .product-description {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        
        .product-category {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .back-button:hover {
            background-color: #3498db;
        }
        
        .rating {
            margin: 15px 0;
            color: #f39c12;
            font-size: 20px;
        }
        
        @media (max-width: 768px) {
            .product-detail {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
            
            <div class="product-info">
                <span class="product-category"><?= htmlspecialchars($product['category']) ?></span>
                <h1 class="product-title"><?= htmlspecialchars($product['name']) ?></h1>
                
                <div class="rating">
                    <?= str_repeat('⭐', $product['rating']) . str_repeat('☆', 5 - $product['rating']) ?>
                </div>
                
                <div class="product-price">
                    <?php if ($product['old_price']): ?>
                    <span class="old-price"><?= number_format($product['old_price'], 0, '', ' ') ?> ₽</span>
                    <?php endif; ?>
                    <span class="new-price"><?= number_format($product['price'], 0, '', ' ') ?> ₽</span>
                </div>
                
                <div class="product-description">
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                </div>
                
                <a href="index.php" class="back-button">Вернуться к каталогу</a>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>