<?php

require __DIR__ . '/Pagination.php';
require __DIR__ . '/database/connect.php';
require __DIR__ . '/funcs.php';

$page = $_GET['page'];
$per_page = 5;
$total = get_count();
$pagination = new Pagination($page, $per_page, $total);
$start = $pagination->get_start();
$count_pages = $pagination->get_count_pages();
$news = get_news($start, $per_page);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css" />
  <title>Document</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>Новости</h1>
    </header>
    <div class="post">
      <?php foreach ($news as $new) {
      ?>
        <div class="post_header">
          <p class="post_date"><?= $new['idate'] = date('d-m-Y',  $new['idate']) ?></p>
          <?php
          $item_title = $new['title'];
          $id = $new['id'];
          echo "<a class='post_title'  href=\"/view.php?id=$id\">$item_title</a>" ?>
        </div>
        <p class="post_announce"><?= $new['announce'] ?></p>
      <?php

      } ?>

    </div>
    <footer>
      <p>Страницы:</p>
      <?php
      for ($i = 0; $i < $count_pages; $i++) {
        $page_number = $i + 1;
        if ($page == $page_number) {
          echo "<a class='btn_item active' href=\"/?page=$page_number\">$page_number</a>";
        } else if (!$page && $i == 0) {
          echo "<a class = 'btn_item active' href=\"/?page=$page_number\">$page_number</a>";
        } else {
          echo "<a class = 'btn_item nonactive' href=\"/?page=$page_number\">$page_number</a>";
        }

      ?>
      <?php
      }
      ?>
    </footer>
  </div>
</body>

</html>