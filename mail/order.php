<?php

    @session_start();

    require_once '../connect/function.php';
    
    $get_postcaptcha = isset($_POST['captcha']) ? $_POST['captcha'] : '';

    $post_name = isset($_POST['name']) ? $_POST['name'] : '';
    $post_number = isset($_POST['number']) ? $_POST['number'] : '';
    $post_mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $post_address = isset($_POST['address']) ? $_POST['address'] : '';
    $post_cart = isset($_POST['cart']) ? $_POST['cart'] : array();
    
    $error_fields = [];

    $get_captcha = isset($_SESSION['captcha_code']) ? $_SESSION['captcha_code'] : '';
    if ($get_captcha != $get_postcaptcha) $error_fields[] = 'captcha';

    $reg_exp = array("options" => array("regexp"=>"/^\+7\d{3}\d{7}$/i"));

    if (empty($post_name)) $error_fields[] = 'name';
    if (empty($post_number) || !filter_var($post_number, FILTER_VALIDATE_REGEXP, $reg_exp)) $error_fields[] = 'number';
    if (empty($post_mail) || !filter_var($post_mail, FILTER_VALIDATE_EMAIL)) $error_fields[] = 'mail';
    if (empty($post_address)) $error_fields[] = 'address';
    if (empty($post_cart)) $error_fields[] = 'cart';

    if (!empty($error_fields)) 
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }

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
    $to .= $post_mail;
    $subject = 'Delivery';
    $headers = 'Content-type: text/html; charset=utf-8 \r\n';

    $message = '<p><b>Имя: </b>' . $post_name . '<br>';
    $message .= '<b>Телефон: </b>' . $post_number . '<br>';
    $message .= '<b>Почта: </b>' . $post_mail . '<br>';
    $message .= '<b>Адрес: </b>' . $post_address . '</p>';

    $total = 0;

    $message .= '<p><b>Заказ:</b></p>';

    $cart_todb = array();
    foreach ($post_cart as $id => $count) 
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
        $response = [
            "status" => true
        ];

        echo json_encode($response);
    } 
    else 
    {
        $response = [
            "status" => false,
            "message" => "Ошибка отправки заказа"
        ];

        echo json_encode($response);
    }

?>