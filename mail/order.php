<?php

function connect()
{
    $db = mysqli_connect("localhost", "u99622_delivery", "delivery", "u99622_delivery");
    if (!$db) {
        die("connection failed: " . mysqli_connect_error());
    }
    return $db;
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
$headers .= 'Content-type: text/html; charset=utf-8 \r\n';

$message .= '<p><b>Имя: </b>' . $_POST['name'] . '<br>';
$message .= '<b>Телефон: </b>' . $_POST['number'] . '<br>';
$message .= '<b>Почта: </b>' . $_POST['mail'] . '<br>';
$message .= '<b>Адрес: </b>' . $_POST['address'] . '</p>';

$cart = $_POST['cart'];
$total = 0;

$message .= '<p><b>Заказ</b></p>';

foreach ($cart as $id => $count) 
{
    $message .= $goods[$id]['name'] . ': ';
    $message .= $count . 'шт. ';
    $message .= $count * $goods[$id]['cost'] . ' руб ';
    $message .= '<br>' . '<br>';
    $total += $count * $goods[$id]['cost'];
}
$message .= '<b>Итого: </b>' . $total . ' руб ';

if (mail($to, $subject,  $message, $headers)) 
{
    echo 'successfully';
} else {
    echo 'error';
}

?>