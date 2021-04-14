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
    
    if ($check_hash = mysqli_query($conn, "SELECT `id`, `email_confirmed` FROM `users` WHERE `hash`='" . $hash . "'")) 
    {
        while($row = mysqli_fetch_assoc($check_hash)) 
        { 
            if ($row['email_confirmed'] == 0) 
            {
                mysqli_query($conn, "UPDATE `users` SET `email_confirmed` = 1 WHERE `id`=". $row['id']);
                echo '<p style="font-size:20px; padding-left: 20px; font-weight: bold;">Email успешно подтвержден</p>';
            } 
            else 
            {
                echo '<p style="font-size:20px; padding-left: 20px; font-weight: bold;">Что-то пошло не так</p>';
            }
        } 
    }
    else 
    {
        echo '<p style="font-size:20px; padding-left: 20px; font-weight: bold;">Что-то пошло не так</p>';
    }

?>
