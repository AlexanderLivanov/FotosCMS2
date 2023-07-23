<form id="upload-img-form" action="content/upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple id="filestoupload">
    <input type="submit" value="Отправить">
</form>
<script>
    if (typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
</script>

<?php
require_once('a/sys/cfg.php');

$stat = "";
if (!empty($_GET['stat'])) {
    $stat = $_GET['stat'];
}

if (!empty($_GET['stat'])) {
    echo ('
    <script>
        Toaster.toast("' . $stat . '");
    </script>
    ');
} else {
    echo '';
}

$err = "";
if (!empty($_GET['err'])) {
    $err = $_GET['err'];
}

if (!empty($_GET['err'])) {
    echo ('
    <script>
        Toaster.error("' . $err . '");
    </script>
');
} else {
    echo '';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container {
            padding: 1em;
            column-count: 4;
        }

        .img-cont {
            position: relative;
        }

        .img-cont .img-button {
            position: absolute;
            bottom: 50px;
            right: 50px;
            transition: all 0.3s;
            display: none;
        }

        .img-cont:hover .img-button {
            position: absolute;
            display: flex;
            transition: all 0.3s;
            bottom: 50px;
            right: 50px;
        }

        img {
            width: 100%;
            margin-bottom: 1em;
            transition: all 0.3s;
            border-radius: 10px;
            box-shadow: 0px 1px 2px 0px grey,
                1px 2px 4px 0px grey,
                2px 4px 8px 0px grey,
                2px 4px 16px 0px grey;
        }

        img:hover {
            width: 100%;
            margin-bottom: 1em;
            filter: blur(10px) grayscale(100%);
            transition: all 0.3s;
            border-radius: 10px;
            box-shadow: 0px 1px 2px 0px grey,
                1px 2px 4px 0px grey,
                2px 4px 8px 0px grey,
                2px 4px 16px 0px grey;
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

<body>

    <h3>Превью вашей галереи:</h3>
    <div class="container">
        <?php
        $directory = "content/" . $_SESSION['user_name'];
        $images = glob($directory . "/*");

        foreach ($images as $image) {
            echo '<div class="img-cont">
                    <img class="gallery-img" src="' . $image . '" alt="">
                    <div class="img-button">
                        <button>Удалить</button>
                    </div>
                </div>';
        }
        ?>
    </div>
</body>

</html>