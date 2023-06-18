<form id="upload-img-form" action="content/upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple>
    <input type="submit" value="Отправить">
</form>

<?php
$stat = "";
if (!empty($_GET['stat'])) {
    $stat = $_GET['stat'];
}

if(!empty($_GET['stat'])){
    echo('
    <script>
        Toaster.toast("' . $stat . '");
    </script>
    ');
}else{
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

<div id="gallery">
    <?php
    require_once('a/sys/cfg.php');

    $directory = 'content/' . $_SESSION['user_name'];
    $allowed_types = array('jpg', 'jpeg', 'gif', 'png');
    $file_parts = array();
    $ext = '';
    $title = '';
    $i = 0;

    //пробуем открыть папку
    $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
    while ($file = readdir($dir_handle)) {
        if ($file == '.' || $file == '..') continue;
        $file_parts = explode('.', $file);
        $ext = strtolower(array_pop($file_parts));
        $title = implode('.', $file_parts);
        $title = htmlspecialchars($title);
        $nomargin = '';
    }
    closedir($dir_handle);

    ?>
    <div class="clear"></div>
</div>