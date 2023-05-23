<?php

namespace App\Models;

class Post extends Database {

    //Affiche les 10 articles sur la page 'liste article'
    public static function getPosts() {        
        // $this->db->query("SELECT * FROM Posts ORDER BY date DESC LIMIT 10");
        $results = self::$db->query("SELECT * FROM Posts LIMIT 10");
        return $results->fetchAll();
    }

    //Affiche la page des commentaires de l'article en sélectionnant un article (en cliquant sur le bouton) parmi les 10 articles de la 'liste article'
     public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }
 
    //Insertion du commentaire de l'article dans la base de données à l'aide du formulaire
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
    
    //Affiche les commentaires de l'article sélectionné sur la page commentaire
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content FROM posts WHERE id_parent = " . $id_parent . " LIMIT 20");
        return $results->fetchAll();
    }
     
    

}