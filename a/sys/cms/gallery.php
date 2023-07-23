<head>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

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
            transition: all 0.3s;
        }

        .img-cont .img-button {
            position: absolute;
            transition: all 0.3s;
            display: none;
            filter: none;
        }

        .img-cont:hover .img-button {
            position: absolute;
            display: flex;
            transition: all 0.3s;
            top: 5%;
            right: 10%;
        }

        .img-cont:hover img {
            filter: blur(10px) grayscale(100%);
            transition: all 0.3s;
            border-radius: 10px;
            box-shadow: 0px 1px 2px 0px grey,
                1px 2px 4px 0px grey,
                2px 4px 8px 0px grey,
                2px 4px 16px 0px grey;
        }

        img {
            transition: all 0.3s;
            width: 100%;
            margin-bottom: 1em;
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
                    <img id="' . $image . '" class="gallery-img" src="' . $image . '" alt="">
                    <div class="img-button">
                        <a href="#" onclick="deleteThisPhoto(\'' . $image . '\')" id="deleteThisPhoto" style="box-shadow: 0 0 15px grey; color: grey; background-color: rgba(255, 255, 255, 1); border: white; border-radius: 5px; padding: 2px; text-align: center; verticle-align: middle;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="" class="icon icon-tabler icon-tabler-trash-filled" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                </div>';
        }
        ?>
    </div>

    <script>
        function deleteThisPhoto(photoID) {
            jQuery.ajax({
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'html',
                url: 'content/delete.php?photoID=' + photoID,
                success: function(html) {
                    $("'" + JSON.stringify('#' + photoID) + "'").hide();
                }
            });
        }
    </script>
</body>

</html>