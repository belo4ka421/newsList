<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "template";

$connect = mysqli_connect($host, $user, $password, $db);
if ($connect == false) {
  echo "Ошибка в подключении";
  echo mysqli_connect_errno();
  exit();
}
