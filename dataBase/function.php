<?php

require_once '../connect/function.php';

function loadGoods()
{
    $db = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["name"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "error";
    }
    mysqli_close($db);
}

switch ($action) 
{
    case 'init':
        init();
        break;
    case 'loadGoods';
        loadGoods();
        break;
}

?>