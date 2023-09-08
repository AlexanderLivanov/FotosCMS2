<?php require_once('a/sys/cfg.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="tab-container" style="text-align: center;">
        <ul class="tabs">
            <li><a href="#tab1">Галерея</a></li>
            <li><a href="#tab2">Записи</a></li>
            <li><a href="#tab3">Личная информация</a></li>
            <li style="pointer-events: none;"><a href="#tab3"><i>Скоро...</i></a></li>
        </ul>
        <div id="tab1" class="tab-content">
            <?php require_once('a/sys/cms/gallery.php'); ?>
        </div>
        <div id="tab2" class="tab-content">
            <?php require_once('a/sys/cms/posts.php'); ?>
        </div>
        <div id="tab3" class="tab-content">
            <?php require_once('a/sys/cms/my.php'); ?>
        </div>
    </div>

</body>

</html>