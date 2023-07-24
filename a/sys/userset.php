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
            <li><a href="#tab2">Личная информация</a></li>
            <li style="pointer-events: none;"><a href="#tab3"><i>Скоро...</i></a></li>
        </ul>
        <div id="tab1" class="tab-content">
            <?php require_once('a/sys/cms/gallery.php'); ?>
        </div>
        <div id="tab2" class="tab-content">
            <?php require_once('a/sys/cms/my.php'); ?>
        </div>
        <div id="tab3" class="tab-content">
            <h2>Tab 3 content</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit iste quidem quisquam perferendis ducimus. Eveniet ad quae quasi autem excepturi. Et aut placeat facilis dolorem fugit temporibus amet saepe voluptates.</p>
        </div>
    </div>

</body>

</html>