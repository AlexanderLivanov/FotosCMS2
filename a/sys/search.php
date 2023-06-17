<?php

require_once('cfg.php');

$users_arr = [];

$sql = mysqli_query($link, 'SELECT `id`, `username` FROM users');
while ($result = mysqli_fetch_array($sql)) {
    $username = $result['username'];
    array_push($users_arr, $username);
}
?>

<head>
    <link rel="stylesheet" href="css/search.css">
</head>
<div class="search">
    <form action="viewprofile" method="POST">
        <input type="text" placeholder="Введите имя пользователя..." name="username">
        <input type="submit" value="Поиск" id="search-btn">
    </form>
</div>