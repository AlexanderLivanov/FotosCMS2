<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <li>
                    <a>
                    <?php
                    require_once('a/sys/search.php');
                    ?>
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
</html>