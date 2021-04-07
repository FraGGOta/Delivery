<?php

    @session_start();

    $post_name = isset($_POST['name']) ? $_POST['name'] : '';
    $post_number = isset($_POST['number']) ? $_POST['number'] : '';
    $post_mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $post_report = isset($_POST['report']) ? $_POST['report'] : '';
    
    $error_fields = [];

    $reg_exp = array("options" => array("regexp"=>"/^\+7\d{3}\d{7}$/i"));

    if (empty($post_name)) $error_fields[] = 'name';
    if (empty($post_number) || !filter_var($post_number, FILTER_VALIDATE_REGEXP, $reg_exp)) $error_fields[] = 'number';
    if (empty($post_mail) || !filter_var($post_mail, FILTER_VALIDATE_EMAIL)) $error_fields[] = 'mail';
    if (empty($post_report)) $error_fields[] = 'report';

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

    $to = 'delivery_employees@mail.ru' . ',';
    $subject = "Обращение в Службу Поддержки";
    $headers = 'Content-type: text/html; charset=utf-8 \r\n';

    $message = '<p><b>Имя: </b>' . $post_name . '<br>';
    $message .= '<b>Телефон: </b>' . $post_number . '<br>';
    $message .= '<b>Почта: </b>' . $post_mail . '<br>';
    $message .= '<b>Сообщение: </b>' . $post_report . '</p>';

    if (mail($to, $subject,  $message, $headers)) 
    {
        $response = [
            "status" => true
        ];

        echo json_encode($response);
    } 
    else 
    {
        $response = [
            "status" => false,
            "message" => "Ошибка отправки сообщения"
        ];

        echo json_encode($response);
    }

?>