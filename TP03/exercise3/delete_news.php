<?php
session_start();                         // starts the session
    include_once('database/connection.php');
    include_once('database/news.php');

    $id=$_GET['id'];

    deleteArticle($id);
    header("Location: list_news.php");
?>