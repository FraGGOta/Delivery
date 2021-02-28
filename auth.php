 <!DOCTYPE html>
 <html lang="ru">

 <head>
     <?php include('head.php'); ?>
     <link rel="stylesheet" href="css/auth.css">
 </head>

 <body>

    <?php 

        include('navigation.php'); 
        session_start();
        $users = 'admin';
        $pass = 'a029d0df84eb5549c641e04a9ef389e5';

        if ($_POST['submit']) 
        {
            if ($users == $_POST['user'] and $pass == md5($_POST['pass'])) 
            {
                $_SESSION['admin'] = $users;
                header("Location: admin.php");
                exit;
            } else echo 'Логин или пароль неверны!';
        }
        
    ?>

    <div class="shape">
         <form class="signin" method="post">
             <input type="text" id="user" name="user" placeholder="username" />
             <input type="password" id="pass" name="pass" placeholder="password" />
             <button type="submit" id="submit" name="submit" value="Login">Войти</button>
         </form>
     </div>

 </body>
 </html>