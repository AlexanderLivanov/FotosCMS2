<?php

require_once('cfg.php');

$users_arr = [];

$sql = mysqli_query($link, 'SELECT `id`, `username` FROM users');
while ($result = mysqli_fetch_array($sql)) {
    $username = $result['username'];
    array_push($users_arr, $username);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>

<body>
    <header class="header">
        <img src="img/icon.png" alt="" style="width: 64px; height: auto" />
        <input class="side-menu" type="checkbox" id="side-menu" />
        <label class="hamb" for="side-menu"><span class="hamb-line"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                </svg></span></label>
        <nav class="nav">
            <ul class="menu">
                <li><a>
                        <select id="js-selectize" name="users" placeholder="Поиск пользователей" style="width:250px; height: 25px; outline:none; border: none; border-bottom: 2px solid #0072ff; vertical-align: middle; outline: none;">
                            <option value="" disabled selected>Поиск пользователей...</option>
                            <?php
                            for ($i = 0; $i < count($users_arr); $i++) {
                                echo ('<option value="' . $users_arr[$i] . '">' . $users_arr[$i] . '</option>"');
                            }
                            ?>
                        </select>
                    </a>
                </li>
                <li><a href="/">Главная</a></li>
                <li><a href="gallery">Галерея</a></li>
                <li><a href="posts">Посты</a></li>
                <li><a href="about">Контакты</a></li>
                <li><a href="profile" style="vertical-align:middle; padding: 15;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="w3-sidebar w3-bar-block" style="width:25%;right:0; background-color: transparent;">
        <h4 class="w3-bar-item">Меню</h4>
        <a href="#" class="w3-bar-item w3-button">Полезные ссылки</a>
        <a href="#" class="w3-bar-item w3-button">Связь со мной</a>
        <a href="#" class="w3-bar-item w3-button">Предложить идею</a>
        <a href="#" class="w3-bar-item w3-button">Поддержать монеткой</a>

    </div>

    <script>
        $(document).ready(function() {
            $('#js-selectize').selectize({
                sortField: 'text'
            });
        });
    </script>
</body>

</html>