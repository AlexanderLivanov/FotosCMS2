<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container {
            padding: 1em;
            column-count: 5;
            width: 90%;
            margin: 0;
        }

        img {
            width: 100%;
            margin-bottom: 1em;

        }

        @media(max-width: 800px) {
            .container {
                column-count: 3;
            }
        }

        @media(max-width: 600px) {
            .container {
                column-count: 2;
            }
        }
    </style>
</head>

<?php

$uname = "";

if (!empty($_POST['username'])) {
    $directory = "content/" . $_POST['username'];
    if (is_dir($directory)) {
        require_once('a/sys/header-fixed.php');
        $images = glob($directory . "/*");
        echo ('<div class="container">');
        foreach ($images as $image) {
            echo '<div><img src="' . $image . '" alt=""></div>';
        }
        echo ('</div>');
    } else {
        echo ('
        <head>
            <link rel="stylesheet" href="css/search.css">
        </head>
        <div class="search" style="text-align: center; margin-top: 20%; background-color: whitesmoke; height: 100px; margin-right: 10%; margin-left: 10%; padding: 1em; border-radius: 40px;">
            <p>Упс... Кажется, такого пользователя нет... Попробуйте повторить поиск:</p>
            <form action="explore" method="POST">
                <input type="text" value="' . $_POST['username'] . '" name="username">
                <input type="submit" value="Поиск" id="search-btn"><br>
                <a href="/" style="text-decoration: none; color: #0072ff;">На главную...</a>
            </form>
        </div>
        ');
    }
} else {
    echo ('
        <head>
            <link rel="stylesheet" href="css/search.css">
        </head>
        <div class="search" style="text-align: center; margin-top: 20%; background-color: whitesmoke; height: 100px; margin-right: 10%; margin-left: 10%; padding: 1em; border-radius: 40px;">
            <p>Кажется, вы что-то неправильно ввели... Попробуйте повторить поиск:</p>
            <form action="explore" method="POST">
                <input type="text" value="' . $_POST['username'] . '" name="username">
                <input type="submit" value="Поиск" id="search-btn"><br>
                <a href="/" style="text-decoration: none; color: #0072ff;">На главную...</a>
            </form>
        </div>
        ');
}

?>