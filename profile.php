<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (!empty($_SESSION)) {
                echo $_SESSION['user_name'] . ' — Профиль';
            } else {
                echo ('Вы не вошли в аккаунт');
            } ?>
    </title>
</head>

<body>
    <?php
    require_once('a/sys/header.php');
    if (!empty($_SESSION)) {
        echo $_SESSION['user_name'] . ' — Профиль' . '<br>';
        require_once('a/sys/userset.php');
    } else {
        echo ('Вы не вошли в аккаунт');
        header("location: login");
    }
    ?>

</body>

</html>