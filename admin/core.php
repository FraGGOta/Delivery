<?php
$action = $_POST['action'];

require_once 'function.php';
require_once '../connect/function.php';

switch ($action)
{
    case 'init':
        init();
        break;
    case 'selectOneGoods':
        selectOneGoods();
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