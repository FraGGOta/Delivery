<?php

$action = $_POST['action'];

require_once 'function.php';
require_once '../connect/function.php';

switch ($action)
{
    case 'selectGoods':
        selectGoods();
        break;
    case 'updateGoods':
        updateGoods();
        break;
    case 'newGoods':
        newGoods();
        break;
    case 'deleteGoods';
        deleteGoods();
        break;     
}

?>