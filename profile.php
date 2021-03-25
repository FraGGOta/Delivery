<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>

    <?php include('navigation.php'); ?>

    <form>
        <?= $_SESSION['user']['name'] ?>
        <br><?= $_SESSION['user']['email'] ?>
        <br><a href="auth/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>