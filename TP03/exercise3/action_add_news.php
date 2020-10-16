<?php
    session_start();                         // starts the session
    include_once('database/connection.php');
    include_once('database/news.php');

    $username=$_SESSION['username'];
    $title=$_POST['title'];
    $introduction=$_POST['introduction'];
    $fulltext=$_POST['fulltext'];
    $tags=$_POST['tags'];

    addArticle($title, $tags, $username, $introduction, $fulltext);
    header("Location: list_news.php");
?>