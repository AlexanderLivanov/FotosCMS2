<?php
session_start();
require_once('a/sys/cfg.php');
require_once('a/sys/time.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $tm = $current_time;
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,password, registered) VALUES (:username, :password_hash, :tm)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("tm", $tm, PDO::PARAM_STR);
        $query->execute();
        if ($query) {
            mkdir('content/' . $username);
            echo '<p class="success">Регистрация прошла успешно!</p>';
            echo 'Регистрация прошла успешно. Сейчас вы будете перенаправлены на главную страницу...';
            echo '<script language="javascript">';
            echo 'alert("Вы успешно зарегистрировались! Сейчас вы будете перенаправлены на страницу входа...")';
            echo '</script>';
            header('Location: login');
        } else {
            echo '<p class="error">Неверные данные!</p>';
        }
    }else{
        echo '<script language="javascript">';
        echo 'alert("Этот ник уже занят! Придумайте другой")';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pages.css">
    <title>Вход — FotosCMS</title>
</head>

<body>
    <div class="main-container">
        <h1>Регистрация</h1>

        <form method="post" action="" name="signup-form">
            <div class="form-element">
                <label>Придумайте логин</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
                <label>Придумайте пароль</label>
                <input type="password" name="password" required />
            </div>
            <button type="submit" name="register" value="register">Зарегистрироваться</button>
        </form>
        <p><a href="login">У меня уже есть аккаунт</a></p>
    </div>
</body>

</html>