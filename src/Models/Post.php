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

    // Selectionne les articles sur la page 'liste article'
    public static function getPosts() {
        $results = self::$db->query("select posts.*, users.username, users.email FROM posts LEFT JOIN users ON posts.id_user = users.id WHERE posts.id_parent is null ORDER BY posts.created DESC LIMIT 10");
        return $results->fetchAll();
    }

    //Selectionne et affiche le détail de l'article de la 'liste article'
    public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT * FROM Posts WHERE id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();

        // Compte tous les éléments du tableau dans une condition et retourne le premier élément de $id
        if (count($tmp)) {/* !!!!!!!!!!!!!!!!!!!!!!!!! */
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
        }
    }

    
    
    
    // GESTION DES ARTICLES DANS LE TABLEAU DE LA PAGE ADMINISTRATEUR : 
    // ****************************************************************
    
    // Méthode qui sélectionne les articles avec l'id à l'aide du bouton 'Modifier'
    public static function getPost($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query('SELECT * FROM Posts WHERE id = '. $id .' ');
        $tmp = $results->fetchAll();
        // Récupère dans la BDD la première clé du tableau sélectionné -> l'id sélectionné au clic du bouton
        if (count($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }

    // Méthode pour modifier un article
    public static function updatePost($id, $content, $title = NULL){
        $results = self::$db -> prepare ('UPDATE posts SET content = ?, title = ? WHERE id = ?');
        $results -> execute ([
            $content,
            $title,
            $id
        ]);
        return $results->fetchAll();
    }

    // Méthode pour supprimer un article
    public static function deletePost($id){
        $results = self::$db -> prepare ('DELETE FROM posts WHERE id = ?');
        $results -> execute ([$id]);
        return $results->fetch();
    }



    // GESTION DES COMMENTAIRES
    // ************************

    // Sélectionne et récupère tous les commentaires dans la page admin avec le status = 0
    public static function commentStatus(){
        $results = self::$db->query("SELECT content, id, status FROM posts WHERE status = '0' AND id_parent is not null ORDER BY id DESC");
        return $results->fetchAll();
    }

    // Sélectionne et récupère les commentaires à valider pour le détail article
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content, status FROM posts WHERE id_parent = " . $id_parent . " AND status = '1' ORDER BY id DESC LIMIT 20");
        return $results->fetchAll();
    }
       
    // Modifie le status du commentaire et le valide
    public static function commentValidate($id, $status){
        $results = self::$db -> prepare ('UPDATE posts set status = "1" WHERE id = '.$id.' ');
        $results -> execute ();
        return $results->fetchAll();
    }
    
    // Modifie le status du commentaire et le rejette
    public static function commentBan($id, $status){
        $results = self::$db -> prepare ('UPDATE posts set status = "-1" WHERE id = '.$id.' ');
        $results -> execute ();
        return $results->fetchAll();
    }
    

    // Méthode pour supprimer un commentaire
    public static function deleteComment($id){
        $results = self::$db -> prepare ('DELETE FROM posts WHERE id = ?');
        $results -> execute ([$id]);
        return $results->fetch();
    }

}




