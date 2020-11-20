<?php
  function getCommentsByNewId($id) {
    global $db;
    $stmt = $db->prepare('SELECT id, news_id, published, text, COALESCE(name, username) as name FROM comments LEFT JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function addComment($id,$username,$text) {
    global $db;
    $stmt = $db->prepare('INSERT INTO comments (news_id, username, text) VALUES (?,?,?) ');
    $stmt->execute(array($id,$username,$text));
    return $stmt->fetchAll();
  }

  function getCommentsAfterLastID($id,$comment_id) {
    global $db;
    $stmt = $db->prepare('SELECT id, news_id, published, text, COALESCE(name, username) as username FROM comments LEFT JOIN users USING (username) WHERE news_id = ? AND id > ?');
    $stmt->execute(array($id,$comment_id+1));
    return $stmt->fetchAll();
  }
?>
