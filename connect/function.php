<?php

$action = $_POST['action'];
$host = "localhost";
$user = "u99622_delivery";
$pass = "delivery";
$name = "u99622_delivery";

function connect()
{
    $db = mysqli_connect("localhost", "u99622_delivery", "delivery", "u99622_delivery");
    if (!$db) 
    {
        die("connection failed: " . mysqli_connect_error());
    }
    return $db;
}

function initPizza()
{
    $conn = connect();
    $sql = "SELECT *  FROM goods WHERE id_category = '1' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function initShaurma()
{
    $conn = connect();
    $sql = "SELECT *  FROM goods WHERE id_category = '2' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function initBurgers()
{
    $conn = connect();
    $sql = "SELECT *  FROM goods WHERE id_category = '3' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function initDrinks()
{
    $conn = connect();
    $sql = "SELECT *  FROM goods WHERE id_category = '4' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}