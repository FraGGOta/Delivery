<?php

    @session_start();

    if (!isset($_SESSION['user'])) 
    {
        header('Location: /');
    }

    if (isset($_SESSION['user']['type']) && $_SESSION['user']['type'] != 'admin') 
    {
        header('Location: /profile.php');
    }

    $get_do = isset($_GET['do']) ? $_GET['do'] : '';

    if ($get_do == 'logout')  
    {
        unset($_SESSION['user']);
        header('Location: /auth.php');
    }
    
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <?php include('head.php'); ?>
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <?php include('navigation.php');  ?>

    <div class="shape">
        
        <form class="signin">

            <div class="points"> Выберите категорию: </div>

            <div class="category-body">
                <select class="form-control category">
                    <option data-id="1">Пицца</option>
                    <option data-id="2">Шаурма</option>
                    <option data-id="3">Бургеры</option>
                    <option data-id="4">Напитки</option>
                </select>
            </div>

            <div class="points"> Выберите товар: </div>
            
            <div class="out-goods">
                <select class="form-control item"></select>
            </div>

            <div class="points"> Название:
                <input type="text" id="gname">
            </div>   
            
            <div class="points"> Цена: 
                <input type="text" id="gcost">
            </div> 

            <div class="points"> Описание: 
                <textarea id="gdescr"></textarea>
            </div> 

            <div class="points"> Картинка: 
                <input type="text" id="gimg">
            </div> 

            <div class="points"> Порядок: 
                <input type="text" id="gord">
            </div> 

            <input type="hidden" id="gid">

            <button class="add-to-db">Обновить/Добавить</button>
            <button class="delete-from-db">Удалить</button>

            <div class="text">
                <a href="auth/logout.php" class="logout">Выход</a>
            </div>    

        </form>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>