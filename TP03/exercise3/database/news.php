<?php 
    function getAllNews() {
        global $db;
        $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                            FROM news JOIN
                                users USING (username) LEFT JOIN
                                comments ON comments.news_id = news.id
                            GROUP BY news.id, users.username
                            ORDER BY published DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getArticle(int $id) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();;
    }

    function updateArticle(int $id, string $title, string $introduction, string $fulltext) {
        global $db;
        $stmt = $db->prepare('UPDATE news SET title= ?, introduction=?, fulltext=? WHERE id = ?');
        $stmt->execute(array($title,$introduction,$fulltext,$id)); 
        
    }

    function addArticle(string $title,string $tags, string $username, string $introduction,string $fulltext) {
        global $db;
        $time=time();
        $stmt = $db->prepare('INSERT INTO news (id,title,published,tags,username,introduction,fulltext) 
                                VALUES (?,?,?,?,?,?,?)');
        $stmt->execute(array(NULL,$title,$time,$tags,$username,$introduction,$fulltext)); 
        
    }

    function deleteArticle(int $id) {
        global $db;
        $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute(array($id));
        
    }

    
?>