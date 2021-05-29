<?php

    $action = $_POST['action'];

    require_once 'function.php';

    switch ($action) 
    {
        case 'connect':
            connect();
            break;
        case 'allGoods':
            allGoods();
            break;
        case 'initPizza':
            initPizza();
            break;
        case 'initShaurma':
            initShaurma();
            break;
        case 'initBurgers':
            initBurgers();
            break;
        case 'initDrinks':
            initDrinks();
            break;
    }

?>