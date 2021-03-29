<?php

    $action = $_POST['action'];

    require_once 'function.php';
    require_once '../connect/function.php';

    switch ($action) 
    {
        case 'allGoods':
            allGoods();
            break;
        case 'loadPizza';
            loadPizza();
            break;
        case 'loadShaurma';
            loadShaurma();
            break;
        case 'loadBurgers';
            loadBurgers();
            break;
        case 'loadDrinks';
            loadDrinks();
            break;
    }

?>