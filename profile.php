<?php

    @session_start();

    if (!isset($_SESSION['user'])) 
    {
        header('Location: /');
    }

    if (isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin') 
    {
        header('Location: /admin.php');
    }

    require_once 'connect/function.php';

    $conn = connect();
    $goods = array();

    $goods_query = mysqli_query($conn, "SELECT * FROM `goods`");

    if (mysqli_num_rows($goods_query) > 0) 
    {
        while ($row = mysqli_fetch_assoc($goods_query))  
        {
            $goods[$row["id"]] = $row;
        }
    }

    $categories = array();

    $categories_query = mysqli_query($conn, "SELECT * FROM `categories`");

    if (mysqli_num_rows($categories_query) > 0) 
    {
        while ($row = mysqli_fetch_assoc($categories_query))  
        {
            $categories[$row["id_category"]] = mb_strtolower($row['name']);
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>

    <?php 

        include('head.php'); 

    ?>

    <link rel="stylesheet" href="css/profile.css">

</head>

<body>

    <?php 

        include('navigation.php'); 

    ?>

    <form class="data">

        <?= $_SESSION['user']['name'] ?>
        <br>
        <?= $_SESSION['user']['email'] ?>
        <br>

    </form>

    <div class="name"> 

        <h3 class="title">История заказов</h3>

    </div>

    <div class="history">

        <?php

            $orders_empty = '<div> Вы ещё ничего не заказывали! </div>';
            $get_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE `account_id` = '".intval($_SESSION['user']['id'])."'");

            if (mysqli_num_rows($get_orders) > 0) 
            {
                while($orders_vals = mysqli_fetch_assoc($get_orders)) 
                {
                    $view_order = '';
        
                    $cart = isset($orders_vals['cart']) ? @json_decode($orders_vals['cart'], true) : array();

                    if (!is_array($cart)) 
                    {
                        unset($cart);
                        $cart = array();
                    }
        
                    $cart_result = '';

                    foreach($cart as $cart_key => $cart_val) 
                    {
                        $cart_name = isset($goods[$cart_val['id']]['name']) ? $goods[$cart_val['id']]['name'] : 'Неизвестное блюдо';
                        $cart_count = isset($cart_val['count']) ? $cart_val['count'] : 0;
                        $cart_type = isset($categories[$goods[$cart_val['id']]['id_category']]) ? $categories[$goods[$cart_val['id']]['id_category']] : '';
                        $cart_result .= $cart_type.' '.$cart_name.' '.$cart_count.'шт.; ';
                    }

                    if (!empty($cart_result)) $cart_result = substr($cart_result, 0, -1);

                    $view_order .= '<span> <b> <font color="black"> &#9658 </font> Заказ: </b> '.$cart_result.'</span><br>';
        
                    echo $view_order;
                }
            } 
            else 
            {
                echo $orders_empty;
            }
            
        ?>

    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>