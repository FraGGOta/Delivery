<!DOCTYPE html>
<html lang="ru">
    
<head>

    <?php include('head.php'); ?>
    <link rel="stylesheet" href="css/cart.css">
    
</head>

<body>

    <?php include('navigation.php'); ?>

    <form action="" class="air">

        <div class="row">Имя
            <input type="name" name="name" id="name" required>
        </div>

        <div class="row">Телефон
            <div class="row-icon">
                <i class="data telephone"></i>
                <input pattern="^\+7\d{3}\d{7}$" maxlength="12" id="number" placeholder="+79999999999" required>
            </div>
        </div>
        
        <div class="row">Почта
            <div class="row-icon">
                <i class="data email"></i>
                <input type="email" name="email" id="mail" required>
            </div>
        </div>

        <div class="row">Ваш адрес
            <textarea rows="3" id="address" required></textarea>
        </div>

        <div class="row" style="">Введите код
            <br><img src="/captcha.php?r=<?=mt_rand();?>" id="captcha-image">&nbsp;
            <button type="button" class="refresh-captcha">Обновить</button>
        </div>

        <div class="row">
            <input type="text" name="captcha" id="captcha" autocomplete="off" required>
        </div>

        <i class="data send"></i>
        <button type="submit" class="send-email">Заказать</button>
        
        <div class="msg none"></div>
    </form>

    <div class="total-sum"></div>

    <div class="cart-container">
        <div class="main-cart"></div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/cart.js"></script>
    <!-- <script src="js/menu.js"></script> -->
    
</body>
</html>