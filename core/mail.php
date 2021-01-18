<?php
// читать json файл
$json = file_get_contents('../goods.json');
$json = json_decode($json, true);

//письмо
$message = '';
$message .= '<h1>Заказ в магазине</h1>';
$message .= '<p>Имя: ' . $_POST['ename'] . '</p>';
$message .= '<p>Адрес: ' . $_POST['eaddress'] . '</p>';
$message .= '<p>Телефон: ' . $_POST['etelephone'] . '</p>';
$message .= '<p>Почта: ' . $_POST['eemail'] . '</p>';

$cart = $_POST['cart'];
$total = 0;
$message .= '<p>Ваш заказ: </p>';
foreach ($cart as $id => $count) {
    $message .= $json[$id]['name'] . ': ';
    $message .= $count . 'шт. ';
    $message .= $count * $json[$id]['cost'] . ' РУБ ';
    $message .= '<br>' . '<br>';
    $total += $count * $json[$id]['cost'];
}
$message .= 'Всего: ' . $total;

$to = 'ramus99.99@mail.ru'.',';
$to .= $_POST['eemail'];
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext . $message . '</body></html>', $headers);

if ($m) {
    echo 1;
} else {
    echo 0;
}
