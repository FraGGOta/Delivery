<!DOCTYPE html>
<html lang="ru">

<head>

    <?php 
    
        include('head.php'); 
    
    ?>
    
</head>

<body>

    <?php 

        include('navigation.php'); 
        
    ?>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src='js/jquery-ui.min.js'></script>
    <script src="js/menu.js"></script>

</body>
</html>

<?php

    require_once 'connect/function.php';
    $conn = connect();

    $hash = $_GET['hash'];

    if ($check_hash = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `hash`='" . $hash . "'")) 
    {
        while($row = mysqli_fetch_assoc($check_hash)) 
        { 
            $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
            $numChars = strlen($chars);
            $password = '';
            
            for ($i = 0; $i < 8; $i++) 
            {
                $password .= substr($chars, rand(1, $numChars) - 1, 1);
            }
            
            echo '<p style="font-size:20px; padding-left: 20px; font-weight: bold;">Ваш новый пароль: ' . $password . '</p>';
            $password = md5($password);
            mysqli_query($conn, "UPDATE `users` SET `password`= '$password' WHERE `id`=". $row['id']);  
        } 
    } 
    else 
    {
        echo '<p style="font-size:20px; padding-left: 20px; font-weight: bold;">Что-то пошло не так</p>';
    }

?>