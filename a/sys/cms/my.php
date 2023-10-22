<?php
$query = $connection->prepare("SELECT * FROM users where `username` = '" . $_SESSION['user_name'] . "'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$datestr = $result['registered'];
$datetime = strtotime($datestr);
$diff = time() - $datetime;
$days = intval($diff / 86400);

echo ($_SESSION['user_name'] . ' — Профиль | Участник сообщества с ' . $result['registered'] . " (" . $days . ' дней назад) &nbsp;<form method="post"><input type="submit" name="logout" value="Выйти"/></form>');
if ($result['admin'] == 1) {
    echo '<p style="color: red;">Вы находитесь в учётной записи администратора!</p>';
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <p></p>
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
            cursor: pointer;
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

        #upload-form {
            text-align: center;
        }

        .input-file-row {
            display: inline-block;
            width: 100%;
        }

        .input-file {
            position: relative;
            display: inline-block;
            width: 75%;
        }

        .input-file span {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            text-decoration: none;
            font-size: 14px;
            vertical-align: middle;
            color: rgb(255 255 255);
            text-align: center;
            border-radius: 5px;
            background-color: #0072ff;
            line-height: 22px;
            width: 60%;
            height: 40px;
            padding: 10px 20px;
            box-sizing: border-box;
            margin: 0;
            transition: all 0.3s;
        }

        @media(max-width: 800px) {
            .input-file span {
                position: relative;
                display: inline-block;
                cursor: pointer;
                outline: none;
                text-decoration: none;
                font-size: 14px;
                vertical-align: middle;
                color: rgb(255 255 255);
                text-align: center;
                border-radius: 5px;
                background-color: #0072ff;
                line-height: 22px;
                width: fit-content;
                height: 40px;
                padding: 10px 20px;
                box-sizing: border-box;
                margin: 0;
                transition: all 0.3s;
            }

            .input-file:hover span {
                background-color: #59be6e;
                width: fit-content;
                height: fit-content;
                transition: all 0.3s;
            }

            .input-file:active span {
                background-color: #2E703A;
                width: fit-content;
                height: fit-content;
            }
        }

        .input-file input[type=file] {
            position: absolute;
            z-index: -1;
            opacity: 0;
            display: block;
            width: 0;
            height: 0;
        }

        /* Focus */
        .input-file input[type=file]:focus+span {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        /* Hover/active */
        .input-file:hover span {
            background-color: #59be6e;
            width: 61%;
            transition: all 0.3s;
        }

        .input-file:active span {
            background-color: #2E703A;
        }

        /* Disabled */
        .input-file input[type=file]:disabled+span {
            background-color: #eee;
        }

        /* Список c превью */
        .input-file-list {
            padding: 10px 0;
        }

        .input-file-list-item {
            display: inline-block;
            margin: 0 15px 15px;
            width: 150px;
            vertical-align: top;
            position: relative;
        }

        .input-file-list-item img {
            width: 150px;
        }

        .input-file-list-name {
            text-align: center;
            display: block;
            font-size: 12px;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        #av-publish-button {
            color: white;
            width: 0.01px;
            height: 0.01px;
            text-align: center;
            vertical-align: middle;
            background-color: #0072ff;
            transition: all 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #av-publish-button:hover {
            color: white;
            width: 155px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            background-color: #59be6e;
            transition: all 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<form id="upload-form" method="post" enctype="multipart/form-data">
    <div class="input-file-row">
        <label class="input-file">
            <input type="file" name="file" id="av-upl" accept="image">
            <span>Загрузить фото профиля</span>
        </label>
        <div class="input-file-list"></div>
        <input type="button" value="Опубликовать" id="av-publish-button" onclick="registerAVUploadClick()">
    </div>
</form>

</html>