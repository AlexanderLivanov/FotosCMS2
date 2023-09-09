<?php

require_once('../a/sys/cfg.php');

if(!empty($_POST)){
    $username = "";
    if (!empty($_SESSION['user_name'])) { $username = $_SESSION['user_name']; }
    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $query = $connection->prepare("INSERT INTO posts (user_name, title, content, pub_date) VALUES ('$username', '$title', '$content', '$current_time')");
    $query->execute();
    header('location: /');
    exit();
}else{
    echo 'ошибка';
}
