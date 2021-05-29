<?php

    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $host = "localhost";
    $user = "u99622_delivery";
    $pass = "delivery";
    $name = "u99622_delivery";

    function connect()
    {
        global $host, $user, $pass, $name;
        $dataBased = mysqli_connect($host, $user, $pass, $name);

        if (!$dataBased) 
        {
            die("connection failed: " . mysqli_connect_error());
        }

        return $dataBased;
    }

    function allGoods()
    {
        $conn = connect();
        $result = mysqli_query($conn, "SELECT * FROM goods");

        if (mysqli_num_rows($result) > 0) 
        {
            $out = array();
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

    function initPizza()
    {
        $conn = connect();
        $result = mysqli_query($conn, "SELECT * FROM goods WHERE id_category = '1'");

        if (mysqli_num_rows($result) > 0) 
        {
            $out = array();
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

    function initShaurma()
    {
        $conn = connect();
        $result = mysqli_query($conn, "SELECT * FROM goods WHERE id_category = '2'");

        if (mysqli_num_rows($result) > 0) 
        {
            $out = array();
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

    function initBurgers()
    {
        $conn = connect();
        $result = mysqli_query($conn, "SELECT * FROM goods WHERE id_category = '3'");

        if (mysqli_num_rows($result) > 0) 
        {
            $out = array();
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

    function initDrinks()
    {
        $conn = connect();
        $result = mysqli_query($conn, "SELECT * FROM goods WHERE id_category = '4'");

        if (mysqli_num_rows($result) > 0) 
        {
            $out = array();
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $out[$row["id"]] = $row;
            }
            echo json_encode($out);
        } 
        else 
        {
            echo "error";
        }

        mysqli_close($conn);
    }

?>