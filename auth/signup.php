<?php

session_start();
require_once '../connect/function.php';

$conn = connect();

$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_login = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'");

if (mysqli_num_rows($check_login) > 0) 
{
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Логин уже существует",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($login === '') 
{
    $error_fields[] = 'login';
}

if ($password === '') 
{
    $error_fields[] = 'password';
}

if ($name === '') 
{
    $error_fields[] = 'name';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    $error_fields[] = 'email';
}

if ($password_confirm === '') 
{
    $error_fields[] = 'password_confirm';
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

if ($password === $password_confirm) 
{

    $password = md5($password);

    mysqli_query($conn, "INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`) VALUES (NULL, '$name', '$login', '$email', '$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);


} 
else 
{
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают!",
    ];
    echo json_encode($response);
}

?>