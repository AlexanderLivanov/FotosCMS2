<?php

require_once('cfg.php');

?>

<head>
    <link rel="stylesheet" href="css/search.css">
</head>
<div class="search">
    <form action="explore" method="POST">
        <input type="text" placeholder="Введите имя пользователя..." name="username" pattern="[a-zA-Z0-9]+">
        <input type="submit" value="Поиск" id="search-btn" style="cursor: pointer;">
    </form>
</div>