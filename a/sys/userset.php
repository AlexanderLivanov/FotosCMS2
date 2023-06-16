<?php
require_once('cfg.php');

$query = $connection->prepare("SELECT * FROM users where `username` = '" . $_SESSION['user_name'] . "'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if ($result['admin'] == 1) {
    echo '<p style="color: red;">Вы находитесь в учётной записи администратора!</p>';
}

echo '<h2>ID: ';
print_r($result['id']);
echo '</h2>';

echo('<h3>Присоединился к нам ' . $result["registered"] . '</h3>');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>