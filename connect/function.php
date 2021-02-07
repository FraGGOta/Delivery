<?php

$action = $_POST['action'];
$host = "localhost";
$user = "u99622_delivery";
$pass = "мой пароль";
$name = "u99622_delivery";

function connect()
{
    $db = mysqli_connect("localhost", "u99622_delivery", "мой пароль", "u99622_delivery");
    if (!$db) {
        die("connection failed: " . mysqli_connect_error());
    }
    return $db;
}

function init()
{
    $db = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "error";
    }
    mysqli_close($db);
}