<?php

require "db.php";

$sql = "SELECT * FROM `news`";
$result = mysqli_query($connect, $sql);

$posts = array();

foreach ($result as $row) {
  $posts[] = $row;
};

$page = $_GET['page'];
$per_page = 5;
$page_count = ceil(count($posts) / $per_page);

function sort_date($a_new, $b_new)
{
  $a_new = $a_new["idate"];
  $b_new = $b_new["idate"];

  return $b_new - $a_new;
}
usort($posts, "sort_date");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css" />
  <title>Document</title>
</head>

<body>
  <section class="container">
    <header>
      <h1>Новости</h1>
    </header>
    <?php for ($i = $page * $per_page; $i < ($page + 1) * $per_page; $i++) : ?>
      <?php if ($posts[$i]['id'] != NULL) : ?>
        <div class="post">
          <div class="post__header">
            <?php
            $now = new DateTimeImmutable();
            $date = $now->setTimestamp($posts[$i]['idate']);
            $dateFormat = $date->format('d.m.Y');
            ?>
            <p class="post__date"><?= $dateFormat  ?></p>
            <a href="/view.php?id=<?= $posts[$i]['id'] ?>">
              <p class="post__title"><?= $posts[$i]['title'] ?></p>
            </a>
          </div>
          <p class="post__announce"><?= $posts[$i]['announce'] ?></p>
        </div>
      <?php endif ?>
    <?php endfor ?>
    <div class="page__list">
      <p>Страницы:</p>
      <?php for ($i = 0; $i < $page_count; $i++) :   ?>
        <a href='?page=<?= $i ?>'>
          <button class='
          <?php if ($page == $i) {
            echo "page__btn selected";
          } else {
            echo "page__btn";
          } ?>'><?= $i + 1 ?></button>
        </a>
      <?php endfor ?>
    </div>
  </section>
</body>

</html>