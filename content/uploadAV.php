<?php
session_start();
$uploadDir = __DIR__ . '/' . $_SESSION['user_name'] . '/';

if(isset($_FILES['avatar'])){
    $file = $_FILES['avatar'];

    $fileName = 'avatar.png';
    $filePath = $uploadDir . $fileName;

    move_uploaded_file($file['tmp_name'], $filePath);

    echo $filePath;
}
