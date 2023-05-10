<?php

namespace App\Models;

class Post extends Database {

    public static function getPosts() {        
        // $this->db->query("SELECT * FROM Posts ORDER BY date DESC LIMIT 10");
        $results = self::$db->query("SELECT * FROM Posts LIMIT 10");
        return $results->fetchAll();
    }

    public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }
 
    public static function insertPost($content, $title = NULL, $id_parent = NULL, $id_user = NULL) {
         //query
         $statement = self::$db -> prepare ('INSERT INTO posts (content, title, id_parent, id_user) VALUES (?, ?, ?, ?)') ;
         $statement -> execute ([
            $content, 
            $title,
            $id_parent,
            $id_user
         ]);
         $commentId = self::$db->lastInsertId();
         return $commentId;        
    }
/***************************************************************** */
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content FROM posts WHERE id_parent = " . $id_parent . " LIMIT 10");
        return $results->fetchAll();
    }
    //SELECT content FROM `posts` WHERE id_parent = 18;
    
    public static function connexion(){
        $stmt = self::$db -> prepare ('INSERT INTO users (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)') ;
        $stmt -> execute ([
           $firstname, 
           $lastname,
           $email,
           $password,
           $role
        ]);
/**************************************************************** */               
    }

    

}