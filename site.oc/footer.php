<footer>
    <div class="footer-content">
        <div class="footer-section">
            <i class="fas fa-info-circle"></i>
            <h3>О нас</h3>
            <p>GymBoss - магазин спортивных добавок для профессионалов и любителей.</p>
        </div>

        <div class="footer-section">
            <i class="fas fa-store"></i>
            <h3>Продукция</h3>
            <p>Сертифицированные товары от ведущих производителей.</p>
        </div>

        <div class="footer-section">
            <i class="fas fa-address-book"></i>
            <h3>Контакты</h3>
            <p>Email: info@gymboss.ru<br>Телефон: +7 (000) 000-00-00<br>Адрес: г. Москва</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 GymBoss. Все права защищены.</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.cart-counter').textContent = '3'; // тестовое значение
        document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
            document.querySelector('.header-nav').classList.toggle('active');
        });
    });
</script>
</body>
</html>
