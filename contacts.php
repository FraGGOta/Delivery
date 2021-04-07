<?php

    @session_start();
    
?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<?php include('head.php'); ?>
	<link rel="stylesheet" href="css/contacts.css">
    
</head>

<body>

	<?php include('navigation.php'); ?>
    
    <div class="window">

        <div class="window-cart">

            <div class="title"> Зона доставки [Новосибирск]</div> 
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A340aa92943f6fefade645e4fbdbf1779d65a966a185c484f31fb0eb205e65f66&amp;source=constructor" width="1000" height="570" frameborder="0"></iframe>
        
        </div>

        <div class="window-cart">

            Доставка на дом или в офис действует в определенной зоне <br>
            доставки, указаной на карте доставки. Это обусловлено тем, <br>
            что мы любим доставлять еду быстро, пока она еще горячая. <br>
            <br> 
            Телефон:
            <div class="text">+7-952-934-40-14</div>
            Вопросы, отзывы и предложения: <br> 
            <div class="text">delivery_employees@mail.ru</div> 

        </div> 
        
    </div>

   	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>