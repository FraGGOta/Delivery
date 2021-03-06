<?php

    @session_start();

    if (isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin') 
    {
        header('Location: /admin.php');
    }

    if (isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'user') 
    {
        header('Location: /profile.php');
    }

?>

<!DOCTYPE html>
<html lang="ru">
    
<head>

    <?php 
    
        include('head.php'); 

    ?>

    <link rel="stylesheet" href="css/auth.css">

</head>

<body>

    <?php 

        include('navigation.php'); 
        
    ?>

    <form class="air-auth">

        <div class="row">Логин

            <input type="text" name="login">

        </div>

        <div class="row">Пароль

            <input type="password" name="password">
            
        </div>

        <button class="login-btn">Войти</button>

        <div class="jump">

            <a class="jump-auth" href="/register.php">Зарегистрироваться</a>

            <a class="jump-newpass" href="/recovery.php">Забыли пароль?</a>

        </div>

        <div class="msg none"></div>

    </form>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src='js/jquery-ui.min.js'></script>
    <script src="js/auth.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>