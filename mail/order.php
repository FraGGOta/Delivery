<?php

    @session_start();

    require_once '../connect/function.php';

    $order_account = 0;
    if (isset($_SESSION['user'])) 
    {
        $order_account = intval($_SESSION['user']['id']);
    }

    $db = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $goods = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $goods[$row["id"]] = $row;
        }
    }

    $to = 'delivery_employees@mail.ru' . ',';
    $to .= $_POST['mail'];
    $subject = 'Delivery';
    $headers = 'Content-type: text/html; charset=utf-8 \r\n';

    $message .= '<p><b>Имя: </b>' . $_POST['name'] . '<br>';
    $message .= '<b>Телефон: </b>' . $_POST['number'] . '<br>';
    $message .= '<b>Почта: </b>' . $_POST['mail'] . '<br>';
    $message .= '<b>Адрес: </b>' . $_POST['address'] . '</p>';

    $cart = isset($_POST['cart']) ? $_POST['cart'] : array();
    $total = 0;

    $message .= '<p><b>Заказ:</b></p>';

    $cart_todb = array();
    foreach ($cart as $id => $count) 
    {
        $message .= $goods[$id]['name'] . ': ';
        $message .= $count . 'шт. ';
        $message .= $count * $goods[$id]['cost'] . ' руб ';
        $message .= '<br>' . '<br>';
        $total += $count * $goods[$id]['cost'];

        array_push($cart_todb, array(
            'id' => $id,
            'count' => $count
        ));
    }

    $message .= '<b>Итого: </b>' . $total . ' руб ';
    $cart_todb_full = json_encode($cart_todb);

    if (mail($to, $subject,  $message, $headers)) 
    {
        if ($order_account > 0) mysqli_query($db, "INSERT INTO `orders` (`account_id`, `cart`) VALUES ('".mysqli_real_escape_string($db, $order_account)."', '".mysqli_real_escape_string($db, $cart_todb_full)."')");
        echo 'successfully';
    } 
    else 
    {
        echo 'error';
    }

?>