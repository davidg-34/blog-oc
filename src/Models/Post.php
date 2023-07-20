<?php

namespace App\Models;

class Post extends Database {

    //Insertion de l'article et des commentaires dans la base de données à l'aide du formulaire
    public static function insertPost($content, $title = NULL, $id_parent = NULL, $id_user = NULL) {


         $statement = self::$db -> prepare ('INSERT INTO posts (content, title, id_parent, id_user, created) VALUES (?, ?, ?, ?, now())') ;
         $statement -> execute ([
            $content,
            $title,
            $id_parent,
            $id_user
         ]);
         $commentId = self::$db->lastInsertId();


         // Retourne le dernier id saisi
         return $commentId;
    }

    // Selectionne et affiche les articles sur la page 'liste article'
    public static function getPosts() {
        $results = self::$db->query("select posts.*, users.firstname, users.lastname, users.email FROM posts LEFT JOIN users ON posts.id_user = users.id WHERE posts.id_parent is null ORDER BY posts.created DESC LIMIT 10");
        //$results = self::$db->query("select posts.id, posts.title, posts.content, users.firstname, users.lastname, users.email FROM posts LEFT JOIN users ON posts.id_user = users.id ORDER BY posts.created DESC LIMIT 10");
        return $results->fetchAll();
    }

    //Selectionne et affiche le détail de l'article parmi les articles de 'liste article'
    public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();

        // Compte tous les éléments du tableau dans une condition et retourne le premier élément de $id
        if (count($tmp)) {
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }

    }

    //Sélectionne et affiche les commentaires de l'article appelé sur la page commentaire
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content FROM posts WHERE id_parent = " . $id_parent . " LIMIT 20");
        return $results->fetchAll();
    }


    // Sélectionne un article à l'aide de l'id
    public static function getPost($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query('SELECT * FROM Posts WHERE id = '. $id .' ');
        $tmp = $results->fetchAll();

        // Récupère dans une condition la première clé du tableau -> l'id sélectionné
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }

    // Méthode pour supprimer un article
    public static function deletePost($id){
        $results = self::$db -> prepare ('DELETE FROM posts WHERE id = ?');
        $results -> execute ([$id]);
        return $results->fetch();
    }

    // Méthode pour modifier un article
    public static function updatePost($id, $content, $title = NULL){
        $results = self::$db -> prepare ('UPDATE posts SET content = ?, title = ? WHERE id = ?');
        //$results = self::$db -> prepare ("UPDATE posts SET content = '$content', title = '$title' WHERE id = '$id'");
        $results -> execute ([
            $content,
            $title,
            $id
        ]);
        return $results->fetchAll();
    }


}




