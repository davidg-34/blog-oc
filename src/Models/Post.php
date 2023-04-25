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
        $results = self::$db->query("SELECT * FROM Posts WHERE id=" . $id . " LIMIT 1");
        $tmp = $results->fetchAll();
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }
 
    public static function insertPost($title = NULL, $content, $parent_id = NULL, $user_id = NULL) {
        // query
        // $sql = INSERT INTO Posts VALUES(:title, :content, :parent_id, :user_id);
        // $sql->execute([
            //"title" => $title, 
            // "content" => $content, 
            // $parent_id, $user_id]); 
        // $commentId = self::$db->lastInsertId();
        // return $commentId;
        // COURS https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914508-ajoutez-modifiez-et-supprimez-des-recettes
    }

}