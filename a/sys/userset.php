<?php
require_once('cfg.php');

$query = $connection->prepare("SELECT * FROM users where `username` = '" . $_SESSION['user_name'] . "'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

echo $_SESSION['user_name'] . ' — Профиль | Участник сообщества с ' . $result['registered'] . '<br>';
if ($result['admin'] == 1) {
    echo '<p style="color: red;">Вы находитесь в учётной записи администратора!</p>';
    echo '
    <form method="post">
        <input type="submit" name="logout"
                value="Выйти"/>
        </form>
    ';
}
?>

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
            <li style="pointer-events: none;"><a href="#tab2"><i>Скоро...</i></a></li>
            <li style="pointer-events: none;"><a href="#tab3"><i>Скоро...</i></a></li>
        </ul>
        <div id="tab1" class="tab-content">
            <?php require_once('a/sys/cms/gallery.php'); ?>
        </div>
        <div id="tab2" class="tab-content">
            <h2>Tab 2 content</h2>
            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div id="tab3" class="tab-content">
            <h2>Tab 3 content</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit iste quidem quisquam perferendis ducimus. Eveniet ad quae quasi autem excepturi. Et aut placeat facilis dolorem fugit temporibus amet saepe voluptates.</p>
        </div>
    </div>

</body>

</html>