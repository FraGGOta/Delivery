<?php

    function selectGoods() 
    {
        $conn = connect();
        $id = $_POST['gid'];

        $result = mysqli_query($conn, "SELECT * FROM goods WHERE id = '$id'");

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

    function updateGoods() 
    {
        $conn = connect();
        $id = $_POST['id'];
        $name = $_POST['gname'];
        $cost = $_POST['gcost'];
        $descr = $_POST['gdescr'];
        $ord =$_POST['gord'];
        $img = $_POST['gimg'];

        if (mysqli_query($conn, "UPDATE goods SET name = '$name', cost = '$cost', descr = '$descr', ord = '$ord', img = '$img' WHERE id = '$id'")) 
        {
            echo "successfully";
        } 
        else 
        {
            echo "error" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    function newGoods()
    {
        $conn = connect();
        $name = $_POST['gname'];
        $cost = $_POST['gcost'];
        $descr = $_POST['gdescr'];
        $ord = $_POST['gord'];
        $img = $_POST['gimg'];
        $id_category = $_POST['gcategory'];

        if (mysqli_query($conn, "INSERT INTO goods (name, id_category, cost, descr, ord, img) VALUES ('$name', '$id_category', '$cost', '$descr', '$ord', '$img')")) 
        {
            echo "successfully";
        } 
        else 
        {
            echo "error" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    function deleteGoods()
    {
        $conn = connect();
        $id = $_POST['id'];

        if (mysqli_query($conn, "DELETE FROM goods WHERE id = '$id'")) 
        {
            echo "successfully";
        } 
        else 
        {
            echo "error" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }

?>