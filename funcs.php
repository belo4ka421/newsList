<?php

function get_count(): int
{
  global $pdo;
  $res = $pdo->query("SELECT COUNT(*) FROM `news`");
  return $res->fetchColumn();
}

function get_news($start, $per_page)
{
  global $pdo;
  $res = $pdo->query("SELECT * FROM `news` ORDER BY `idate` DESC LIMIT $start, $per_page  ");
  return $res->fetchAll();
}


function get_single_new($id)
{
  global $pdo;
  $res = $pdo->query("SELECT * FROM `news` WHERE `id` = $id");
  return $res->fetchAll();
}
