<?php

require_once('cfg.php');

?>

<head>
    <link rel="stylesheet" href="css/search.css">
</head>
<div class="search">
    <form action="explore" method="POST">
        <input type="text" placeholder="Введите имя пользователя..." name="username">
        <input type="submit" value="Поиск" id="search-btn">
    </form>
</div>