<?php

$to = "delivery_employees@mail.ru"; 
$subject = "Обращение в Службу Поддержки";
$headers .= 'Content-type: text/html; charset=utf-8 \r\n';

$message = "<p><b>Имя:</b> ".$_POST['name']."<br>";
$message .= "<b>E-mail: </b>".$_POST['email']."<br>"; 
$message .= "<b>Телефон: </b>".$_POST['phone']."<br>"; 
$message .= "<b>Сообщение: </b>".$_POST['message']."<br></p>";

if (mail($to, $subject, $message, $headers)) 
{
    echo 'successfully';
} else {
    echo 'error';
}

header('Location: http://u99622.test-handyhost.ru/');
exit;

?>