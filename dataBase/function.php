<?php

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

    function loadPizza()
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

    function loadShaurma()
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

    function loadBurgers()
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

    function loadDrinks()
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