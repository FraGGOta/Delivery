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
			<div class="slide">
				<img src="images/slide_1.png" alt="">
				<img src="images/slide_2.png" alt="">
				<img src="images/slide_3.png" alt="">
			</div>
			<button class="right"><</button>
			<button class="left">></button>
		</div>

   	</div> 

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
   	<script src="../js/index.js"></script>

</body>
</html>