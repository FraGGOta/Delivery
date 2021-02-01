<?php

$to = 'ramus99.99@mail.ru' . ',';
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
foreach ($cart as $id => $count) {
    $message .= $json[$id]['name'] . ': ';
    $message .= $count . 'шт. ';
    $message .= $count * $json[$id]['cost'] . ' руб ';
    $message .= '<br>' . '<br>';
    $total += $count * $json[$id]['cost'];
}
$message .= '<b>Итого: </b>' . $total . ' руб ';

if (mail($to, $subject,  $message, $headers)) {
    echo 'successfully';
} else {
    echo 'error';
}

?>