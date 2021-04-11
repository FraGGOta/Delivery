
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

        <div class="row">Введите ваш Email

            <input type="email" name="email">

        </div>

        <button type="submit" class="recovery-btn">Отправить</button>

        <div class="msg none"></div>

    </form>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/auth.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>