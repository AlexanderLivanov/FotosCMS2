<form action="content/upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple>
    <input type="submit" value="Отправить">
</form>

<div id="gallery">
    <?php
    require_once('a/sys/cfg.php');

    $directory = 'content/' . $_SESSION['user_name'];
    echo $path;
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