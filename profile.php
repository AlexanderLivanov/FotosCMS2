<?php
require_once('a/sys/cfg.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php
            if (!empty($_SESSION)) {
                echo $_SESSION['user_name'] . ' — Профиль';
            } else {
                echo ('Вы не вошли в аккаунт');
            } 
        ?>
    </title>
</head>

<body>
    <?php
    require_once('a/sys/header.php');
    if (!empty($_SESSION)) {
        echo $_SESSION['user_name'] . ' — Профиль' . '<br>';
        require_once('a/sys/userset.php');
        echo('
        <form method="post">
        <input type="submit" name="logout"
                value="Выйти"/>
        </form>
        ');
        if (isset($_POST['logout'])) {
            session_destroy();
            header('location: login');
        }
    } else {
        echo ('Вы не вошли в аккаунт');
        echo('
        <h3>&#10148;
            <a href="login" style="text-decoration: none; color: #0072ff; margin-left: 10px;">Войти</a>
        </h3>
        ');
    }
    ?>

</body>

</html>