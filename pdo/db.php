<?php
$db_server = 'localhost';
$db_name = 'osk_market';
$db_user = 'root';
$db_password = '';

$dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8";

$opt = array(
    PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
?>