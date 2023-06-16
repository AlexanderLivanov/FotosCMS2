<?php
session_start();

// PDO Connect

// ! Change here:

define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'fotoscms');
try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

// MySQLi connect(Legacy)

// ! And change here:

$host = 'localhost'; 
$user = 'root';   
$pass = '';
$db_name = 'fotoscms';  
$link = mysqli_connect($host, $user, $pass, $db_name);