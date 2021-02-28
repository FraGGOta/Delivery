<?php

function allGoods()
{
    $conn = connect();
    $sql = "SELECT *  FROM goods ";
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

function loadPizza()
{
    $db = connect();
    $sql = "SELECT *  FROM goods WHERE id_category = '1' ";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "error";
    }
    mysqli_close($db);
}

function loadShaurma()
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

function loadBurgers()
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

function loadDrinks()
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

?>