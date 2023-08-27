<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/fonts-fix.css">
    <style>
        .container {
            padding: 1em;
            column-count: 5;
            margin: 0;
            justify-items: center;
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

        .gallery-item {
            border-radius: 5px;
            transition: all 0.3s;
        }

        .gallery-item:hover {
            border-radius: 5px;
            scale: 1.1;
            transition: all 0.3s;
        }

        .gallery-item:fullscreen {
            border-radius: 5px;
            scale: 1;
            transition: all 0.3s;
        }

        #profile-banner {
            height: 200px;
            background-color: grey;
            border-radius: 5px;
            margin: 1em;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            object-fit:fill;
            /* background-image:  */
        }

        #profile-banner h1, h3 {
            color: whitesmoke;
            text-align: start;
            font-family: sans-serif;
            font-weight: 900;
        }

        #profile-avatar img {
            width: 150px;
            height: 150px;
            border-radius: 1000px;
            object-fit: cover;
            padding: 1em;
            justify-items: center;
        }
    </style>
</head>

<?php

$uname = "";

if (!empty($_POST['username'])) {
    $directory = "content/" . $_POST['username'];
    if (is_dir($directory)) {
        require_once('a/sys/header-fixed.php');
        $query = $connection->prepare("SELECT * FROM users where `username` = '" . $_POST['username'] . "'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo ('<div style="border-radius: 5px; text-align: center; padding: 1em;">');
        echo('<div id="profile-banner">');
        echo('
            <div id="profile-avatar">
                <img src="https://cdnn1.inosmi.ru/images/23538/30/235383059.jpg">
            </div>
        ');
        echo('<div style="padding: 1em;">');
        echo('<h1>' . $_POST['username'] . '</h1>');
        echo('<h3>Участник сообщества с ' . $result['registered'] . '</h3>');
        echo('</div>');
        echo('</div>');
        $images = glob($directory . "/*");
        echo ('<div class="container">');
        foreach ($images as $image) {
            echo '<div><img class="gallery-item" id="' . $image . '" src="' . $image . '" alt=""></div>';
        }
        echo ('</div>');
        echo ('</div>');
    } else {
        echo ('
        <head>
            <link rel="stylesheet" href="css/search.css">
        </head>
        <div class="search" style="text-align: center; margin-top: 20%; background-color: whitesmoke; height: 100px; margin-right: 10%; margin-left: 10%; padding: 1em; border-radius: 40px;">
            <p>Упс... Кажется, такого пользователя нет... Попробуйте повторить поиск:</p>
            <form action="explore" method="POST">
                <input type="text" value="' . $_POST['username'] . '" name="username" pattern="[a-zA-Z0-9]+">
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
                <input type="text" value="' . $_POST['username'] . '" name="username" pattern="[a-zA-Z0-9]+">
                <input type="submit" value="Поиск" id="search-btn"><br>
                <a href="/" style="text-decoration: none; color: #0072ff;">На главную...</a>
            </form>
        </div>
        ');
}

?>

<body>
    <script>
        $(document).ready(function() {
            $(".gallery-item").click(function() {
                this.requestFullscreen()
            })
        });
    </script>
</body>