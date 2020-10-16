<?php 
    function userExists(string $username, string $password) {
        global $db;
        $pass = sha1($password);
        $stmt = $db->prepare('SELECT * FROM users WHERE username=? AND password=?');
        $stmt->execute(array($username,$pass)); 
        
        $user=$stmt->fetch();

        if($user) return TRUE;
        return FALSE;
    }

    
?>