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