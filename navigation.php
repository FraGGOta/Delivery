<?php

    $detect_username = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';
    $detect_logout = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';
    
    if (empty($detect_username)) 
    {
        $detect_username = '<a class="nav-link" href="auth.php">ВОЙТИ';
    }
    else if (!empty($detect_username))
    {
        $detect_username = '<a class="nav-link" href="auth.php">ПРОФИЛЬ('.$detect_username.')';
    }
    
    if (!empty($detect_logout))
    {
        $detect_logout = '<a class="nav-link" href="auth/logout.php">ВЫХОД</a>';
    }

?>

<div class="header">

    <div class="container">

        <div class="header-inner">

            <nav class="nav">
                <a class="nav-link" href="index.php">ГЛАВНАЯ</a>
            </nav>

            <nav class="nav">

                <a class="nav-link" href="quality.php">КАЧЕСТВО</a>
                <a class="nav-link" href="menu.php">МЕНЮ</a>
                <a class="nav-link" href="about.php">О НАС</a>
                <a class="nav-link" href="contacts.php">КОНТАКТЫ</a>

                <?php 
                            
                    echo $detect_username; 
                    echo $detect_logout; 
                        
                ?>
 
                <a class="nav-link" id="cart_menu" href="cart.php">КОРЗИНА</a>

                <span class="mini-cart"></span>

            </nav>

        </div>

    </div>
    
</div>
