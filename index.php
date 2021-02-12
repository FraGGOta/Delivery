<!DOCTYPE html>
<html lang="ru">

<head>
	<?php include('head.php'); ?>
	<link rel="stylesheet" href="css/index.css">
</head>

<body>

	<?php include('navigation.php'); ?>

	<div class="intro">
    	<h3 class="intro-title">Уникальные предложeния, не пропусти!</h3>
      	<div class="slider">
        	<div class="block curry">
        		<h3 class="spec"> Подарок на Ваш выбор! </h3>Больше еды — больше удовольствия. Дарим любой пункт меню на Ваш выбор при заказе от 2-ух тысяч рублей. Акции не суммируются.
        	</div>
         	<div class="block">
            	<h3 class="spec"> Подарок в день рождения! </h3> Во время звонка оператора назови ему свою дату рождения и получи подарок. Акция действует также каждый день в течение 3 дней до и 10 после праздника, при заказе от 800 рублей! Акции не суммируются.
         	</div>
         	<div class="block">
            	<h3 class="spec"> Напитки по суперцене! </h3> Добавьте в корзину 2 или 3 напитка на Ваш выбор, и после звонка оператора их цена снизится. Акции не суммируются.
         	</div>
         	<button class="next"><a class="link" href="#"> Назад </a></button>
         	<button class="previous"><a class="link" href="#"> Вперед </a></button>
      	</div>
   	</div>

   	<!-- <div class="footer">
      	<a class="nav-link" href="auth.php">ВХОД</a>
   	</div> -->

	<button class="open-button" onclick="openForm()">Поддержка</button>

	<div class="form-popup" id="myForm">

  		<form autocomplete="off" action="mail/support.php" method="post" class="form-container">

    		<h2>Опишите Вашу проблему</h2>
    		<input type="text" placeholder="Имя" name="name" required>
    		<input type="email" placeholder="E-mail" name="email" required>
    		<input type="text" pattern="^\+7\d{3}\d{7}$" value="+7" maxlength="12" placeholder="Телефон" name="phone" required>
			<textarea rows="5" placeholder="Сообщение" name="message" required></textarea>
    		<button type="submit" class="send-email">Отправить</button>
    		<button type="button" class="send-email cancel" onclick="closeForm()">Закрыть</button>
			
  		</form>

	</div>

   	<script src="../js/jquery-3.5.1.min.js"></script>
   	<script src="../js/main.js"></script>

</body>
</html>