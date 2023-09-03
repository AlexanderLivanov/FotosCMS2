<head>
    <style>
        .container {
            padding: 1em;
            column-count: 5;
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
    </style>
</head>
<body>

<h1 style="color: #0072ff;"><a style="color: #0072ff; text-decoration: none; margin: 40% 0 40% 40%;" href="/">FotosWorld / Главная</a></h1>

<?php 
require_once('../../a/sys/cfg.php');

$query = $connection->prepare("SELECT * FROM users where `id` = '" . basename(__DIR__) . "'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$username = $result['username'];

echo('<div style="border-radius: 5px; text-align: center; padding: 1em;">');
echo $username . ' — Профиль | Участник сообщества с ' . $result['registered'] . ' &nbsp;';
$images = glob("../../content/" . $username . "/*");

if(!empty($images)){
    echo ('<div class="container">');
    foreach ($images as $image) {
        echo '<div><img class="gallery-item" id="' . $image . '" src="' . $image . '" alt=""></div>';
    }
    echo ('</div>');
}else{
    echo('<h3>Пользователь пока не добавил контент</h3>');
}

echo ('</div>');
?>

    <script>
        $(document).ready(function () {
            $(".gallery-item").click(function () {
                this.requestFullscreen()
            })
        });
    </script>
</body>