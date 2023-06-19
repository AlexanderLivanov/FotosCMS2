<form id="upload-img-form" action="content/upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple id="filestoupload">
    <input type="submit" value="Отправить">
</form>

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

<body>

    <h3>Превью вашей галереи:</h3>
    <div class="container">

        <?php
        $directory = "content/" . $_SESSION['user_name'];
        $images = glob($directory . "/*");

        foreach ($images as $image) {
            echo '<div><img src="' . $image . '" alt=""></div>';
        }
        ?>
    </div>
</body>

</html>