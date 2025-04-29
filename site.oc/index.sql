CREATE DATABASE sport_shopp;

USE sport_shopp;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    old_price DECIMAL(10, 2),
    image_url VARCHAR(255),
    rating INT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Добавляем тестовые данные
INSERT INTO products (name, description, price, old_price, image_url, rating, category) VALUES
('Протеин Whey', 'Высококачественный сывороточный протеин для набора мышечной массы. Содержит 24 г белка на порцию.', 1199.00, 1900.00, 'https://thehealthhouse.nl/wp-content/uploads/2024/11/PHOTO-2024-11-30-15-58-24-2-500x500.jpg', 3, 'Протеины'),
('Гейнер 2000', 'Высококалорийный гейнер с оптимальным соотношением белков и углеводов для быстрого набора массы.', 1259.00, 2100.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/complex_carb_gainer_1kg__2021__5-500x500.webp', 4, 'Гейнеры'),
('Креатин', 'Чистый креатин моногидрат для увеличения силы и выносливости во время тренировок.', 1399.00, 2000.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/optimum-nutrition-100-whey-gold-2lb-french-vanilla-creme-seal-300x300.jpg', 4, 'Креатин'),
('Бцаа', 'Аминокислоты с разветвленной цепью для восстановления мышц и предотвращения катаболизма.', 1199.00, 2000.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/Afbeelding43-500x500.png', 4, 'Аминокислоты'),
('Витамин D3', 'Высокодозированный витамин D3 для поддержки иммунитета и здоровья костей.', 899.00, 1200.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/vitamin_k2___d3_mockup-500x500.webp', 5, 'Витамины'),
('Протеиновый батончик', 'Вкусный и полезный перекус с высоким содержанием белка и низким содержанием сахара.', 89.00, 199.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/32-protein-wafer-bar-12-bars-chocolate-12-x-35-g-500x500.png', 3, 'Батончики'),
('C4 Ultimate', 'Мощный предтренировочный комплекс для увеличения энергии и фокуса на тренировке.', 1369.00, 2000.00, 'https://thehealthhouse.nl/wp-content/uploads/2024/11/c4_ultimate_tutti_frutti-500x500.png', 4, 'Предтреники'),
('Omega-3', 'Высококачественные омега-3 кислоты для поддержки сердечно-сосудистой системы и суставов.', 679.00, 1100.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/image_2021-01-05_5ff45a1f47bc7.jpg', 4, 'Витамины'),
('Zinc', 'Цинк в биодоступной форме для поддержки иммунитета и гормонального фона.', 799.00, 1200.00, 'https://thehealthhouse.nl/wp-content/uploads/2023/01/R-e1673444483979.jpg', 5, 'Минералы'),
('Шейкер', 'Удобный шейкер с сеточкой для размешивания коктейлей и дополнительным отделением.', 499.00, 800.00, 'https://thehealthhouse.nl/wp-content/uploads/2022/12/Shaker-800ml-500x500.webp', 3, 'Аксессуары');