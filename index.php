<?php

	@session_start();
	
?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<?php 

		include('head.php'); 

	?>

	<link rel="stylesheet" href="css/index.css">
	
</head>

<body>

	<?php 

		include('navigation.php'); 

	?>

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

  		<form action="" class="form-container">

    		<h2>Опишите Вашу проблему</h2>

    		<input type="name" name="name" id="name" placeholder="Имя" required>
    		<input maxlength="12" id="number" placeholder="+7XXXXXXXXXX" required>
    		<input type="email" name="email" id="mail" placeholder="Почта" required>
			<textarea rows="5" id="report" placeholder="Сообщение" required></textarea>
			
    		<button type="submit" class="send-email">Отправить</button>
    		<button type="button" class="cancel" onclick="closeForm()">Закрыть</button>
			
			<div class="msg none"></div>
			
  		</form>

	</div>

	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/index.js"></script>
	<script src="js/menu.js"></script>

</body>
</html>