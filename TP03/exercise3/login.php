<?php
session_start();                         // starts the session
  include_once('database/connection.php');
  include_once('database/news.php');
  
  include_once('templates/common/header.php');
  include_once('templates/users/login.php');
  include_once('templates/common/footer.php');
  
?>