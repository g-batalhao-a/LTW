<?php
  session_start();                         // starts the session
  include_once('database/connection.php');
  include_once('database/news.php');
  include_once('database/comments.php');

  $article = getArticle($_GET['id']);
  $tags = explode(',', $article['tags']);
  $comments = getComments($_GET['id']);

  include_once('templates/common/header.php');
  include_once('templates/news/view_news.php');
  include_once('templates/common/footer.php');
?>