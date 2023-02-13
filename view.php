<?php

require __DIR__ . '/database/connect.php';
require __DIR__ . '/funcs.php';

$id = $_GET['id'];;
$single_new = get_single_new($id);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/view.css" />
  <title>Document</title>
</head>

<body>
  <div class="container">
    <?php
    foreach ($single_new as $new) {
    ?>
      <h2 class="title"><?= $new['title'] ?></h2>
      <div class="container_content">
        <div class="content"><?= $new['content'] ?></div>
      </div>
    <?php
      echo "<a  href=\"/?page=1\">Все новости >></a>";
    }
    ?>
  </div>
</body>

</html>