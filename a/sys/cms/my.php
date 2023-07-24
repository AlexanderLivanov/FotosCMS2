<?php
$query = $connection->prepare("SELECT * FROM users where `username` = '" . $_SESSION['user_name'] . "'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

echo $_SESSION['user_name'] . ' — Профиль | Участник сообщества с ' . $result['registered'] . ' &nbsp;';
echo '<form method="post"><input type="submit" name="logout" value="Выйти"/></form>';
if ($result['admin'] == 1) {
    echo '<p style="color: red;">Вы находитесь в учётной записи администратора!</p>';
}
?>