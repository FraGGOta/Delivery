<?php

    $detect_username = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';
    if (!empty($detect_username)) $detect_username = '&nbsp;('.$detect_username.')';

?>

<div class="header">

    <div class="container">

        <div class="header-inner">

            <nav class="nav">
                <a class="nav-link" href="index.php">Delivery</a>
            </nav>

            <nav class="nav">

                <a class="nav-link" href="index.php">ГЛАВНАЯ</a>
                <a class="nav-link" href="quality.php">КАЧЕСТВО</a>
                <a class="nav-link" href="menu.php">МЕНЮ</a>
                <a class="nav-link" href="about.php">О НАС</a>
                <a class="nav-link" href="contacts.php">КОНТАКТЫ</a>

                <div class="dropdown">

                    <a class="dropbtn">ПРОФИЛЬ <?php echo $detect_username; ?></a>

                    <div class="dropdown-content">

                        <a class="nav-link" href="auth.php">ВОЙТИ</a>
                        <a class="nav-link" href="auth/logout.php">ВЫХОД</a>

                    </div>

                </div>

                <a class="nav-link" id="cart_menu" href="cart.php">КОРЗИНА</a>

                <span class="mini-cart"></span>

            </nav>

        </div>

    </div>
    
</div>
