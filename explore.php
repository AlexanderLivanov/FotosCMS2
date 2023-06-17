<?php

$uname = "";

if(!empty($_POST['username'])){
    $uname = $_POST['username'];
    echo $uname;
}else{
    echo 'Запрос не определен';
}

?>