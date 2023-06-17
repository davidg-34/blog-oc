<?php

namespace App\Models;

class Post extends Database {

    // Selectionne et affiche les articles sur la page 'liste article'
    public static function getPosts() {        
        // $this->db->query("SELECT * FROM Posts ORDER BY date DESC LIMIT 10");
        $results = self::$db->query("SELECT * FROM Posts LIMIT 500");
        return $results->fetchAll();
    }

    //Selectionne et affiche le détail de l'article parmi les articles de 'liste article'
    public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();
        //!!
        if (count($tmp)) { 
            return $tmp[0];            
        }
        throw new \Exception("Missing post", 404);
}
 
    //Insertion de l'article et des commentaires dans la base de données à l'aide du formulaire
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
         //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
         if ($session->has("userId")){
            $articleId = self::$db->lastInsertId();
            return $articleId;
         }else{
            throw new \Exception("Vous n'êtes pas autorisé à créer un article");
         }        
    }// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //
    
    //Sélectionne et affiche les commentaires de l'article appelé sur la page commentaire
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content FROM posts WHERE id_parent = " . $id_parent . " LIMIT 20");
        return $results->fetchAll();
    }
     
    

}