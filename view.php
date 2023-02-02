<?php
require "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM news WHERE id = " . $id;
$result = mysqli_query($connect, $sql);
$post = mysqli_fetch_assoc($result);

$page = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view.css" />
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h2 class="title"><?= $post['title'] ?></h2>
    <div class="container__content">
      <div class="content"><?= $post['content'] ?></div>
    </div>
    <a href="/?page=<?= $page ?>" class="all__news">Все новости >></a>
  </div>
</body>

</html>