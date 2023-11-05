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
    <script src="js/toaster.js"></script>
</head>

<body>
    <form id="avatarForm" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar" id="avatarInput" accept="image/*">
        <button type="submit">Загрузить аватар</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#avatarForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'content/uploadAv.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'text',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // Отображаем загруженный аватар
                        Toaster.toast('Фото профиля успешно обновлено');
                        window.setTimeout('location.reload()', 500); //Reloads after three seconds
                    }
                });
            });
        });
    </script>
</body>

</html>