<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <?php include('navigation.php');  ?>

    <div class="shape">
        <form class="signin">
            <div class="goods-out"></div>
            Название: <input type="text" id="gname">
            Цена: <input type="text" id="gcost">
            Описание: <textarea id="gdescr"></textarea>
            Картинка: <input type="text" id="gimg">
            Порядок: <input type="text" id="gord">
            <input type="hidden" id="gid">
            <button class="add-to-db">Обновить</button>
            <button class="delete-from-db">Удалить</button>
            <a class="link" href="admin.php?do=logout">Выход</a>
        </form>
    </div>

    <?php
    session_start();
    if ($_GET['do'] == 'logout') {
        unset($_SESSION['admin']);
        session_destroy();
    }
    if ($_SESSION['admin'] != "admin") {
        header("Location: auth.php");
        exit;
    }
    ?>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/admin.js"></script>

</body>

</html>