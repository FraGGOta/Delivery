
<?php

    session_start();
    require_once '../connect/function.php';

    $conn = connect();

    $email = $_POST['email'];

    $check_email = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");

    if (mysqli_num_rows($check_email) == 0) 
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Аккаунта не существует",
            "fields" => ['email']
        ];

        echo json_encode($response);
        die();
    }

    $hash = md5($email . time());

    $error_fields = [];

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_fields[] = 'email';
    }

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

    $subject = "Восстановление пароля";
    $headers = 'Content-type: text/html; charset=utf-8 \r\n';
        
    $message = '<p>Мы получили от Вас запрос на смену пароля!</p>';
    $message .= '<p><b>Для сброса пароля, пройдите по ссылке ниже.</b></p>';
    $message .= '<p><b><a href="http://u99622.test-handyhost.ru/newpass.php?hash=' . $hash . '">Сбросить пароль</b></a></p>';
    $message .= '<p>С уважением, Ваш Delivery</p>'; 	
    $message .= '<p><i>Если Вы не запрашивали изменение пароля - проигнорируйте это письмо.</i></p>'; 	
            
    mysqli_query($conn, "UPDATE `users` SET hash = '$hash' WHERE email = '$email'");
            
    if (mail($email, $subject, $message, $headers)) 
    {
        $response = [
            "status" => true,
            "message" => "Проверьте email"
        ];

        echo json_encode($response);
    } 
    else 
    {
        $response = [
            "status" => false,
            "message" => "Ошибка"
        ];
            
        echo json_encode($response);
    }
    
?>