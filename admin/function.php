<?php

function selectGoods() 
{
    $db = connect();
    $id = $_POST['gid'];
    $sql = "SELECT * FROM goods WHERE id = '$id'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "error";
    }
    mysqli_close($db);
}

function updateGoods() 
{
    $db = connect();
    $id = $_POST['id'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord =$_POST['gord'];
    $img = $_POST['gimg'];

    $sql = "UPDATE goods SET name = '$name', cost = '$cost', descr = '$descr', ord = '$ord', img = '$img' WHERE id = '$id' ";

    if (mysqli_query($db, $sql)) 
    {
        echo "successfully";
    } else {
        echo "error" . mysqli_error($db);
    }
    mysqli_close($db);
}

function newGoods()
{
    $db = connect();
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord = $_POST['gord'];
    $img = $_POST['gimg'];
    $id_category = $_POST['gcategory'];

    $sql = "INSERT INTO goods (name, id_category, cost, descr, ord, img) VALUES ('$name', '$id_category', '$cost', '$descr', '$ord', '$img')";

    if (mysqli_query($db, $sql)) 
    {
        echo "successfully";
    } else {
        echo "error" . mysqli_error($db);
    }
    mysqli_close($db);
}

function deleteGoods()
{
    $db = connect();
    $id = $_POST['id'];

    $sql = "DELETE FROM goods WHERE id = '$id' ";

    if (mysqli_query($db, $sql)) 
    {
        echo "successfully";
    } else {
        echo "error" . mysqli_error($db);
    }
    mysqli_close($db);
}

?>