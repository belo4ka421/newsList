<?php

$host = 'localhost';
$db_name = 'template';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
  $pdo = new PDO(
    "mysql:host=$host;dbname=$db_name;charset=$charset",
    $db_user,
    $db_pass,
    $options
  );
} catch (PDOException $i) {
  die("Ошибка подключения к базе данных");
}
