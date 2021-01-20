<?php
  include_once('database/connection.php');
  include_once('database/news.php');
  include_once('database/comments.php');

  if (!isset($_POST['id'])||!isset($_POST['username'])||!isset($_POST['text'])||!isset($_POST['comment_id']))
    die("No values");

    addComment($_POST['id'],$_POST['username'],$_POST['text']);
    $comments = getCommentsAfterLastID($_POST['id'],$_POST['comment_id']);
    echo(json_encode($comments));
?>
