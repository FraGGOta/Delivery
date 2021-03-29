<?php

    session_start();
    require_once '../connect/function.php';

    $conn = connect();

    $login = $_POST['login'];
    $password = $_POST['password'];

    $error_fields = [];

    if ($login === '') 
    {
        $error_fields[] = 'login';
    }

    if ($password === '') 
    {
        $error_fields[] = 'password';
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

    $password = md5($password);

    $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) 
    {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "type" => $user['type']
        ];

        $response = [
            "status" => true,
            "type" => $user['type']
        ];

        echo json_encode($response);
    } 
    else 
    {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }
    
?>
