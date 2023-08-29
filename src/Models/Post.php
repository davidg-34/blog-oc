<?php

namespace App\Models;

class Post extends Database {

    //Insertion de l'article et des commentaires dans la base de données à l'aide du formulaire
    public static function insertPost($content, $title = NULL, $id_parent = NULL, $id_user = NULL, $chapeau = NULL) {
         $statement = self::$db -> prepare ('INSERT INTO posts (content, title, id_parent, id_user, chapeau, created) VALUES (?, ?, ?, ?, ?, now())') ;
         $statement -> execute ([
            $content,
            $title,
            $id_parent,
            $id_user,
            $chapeau
         ]);
         $id = self::$db->lastInsertId();
         // Retourne le dernier id saisi
         return $id;
    }

    // Selectionne les articles sur la page 'liste article'
    public static function getPosts() {
        $results = self::$db->query("select posts.*, users.username, users.email FROM posts LEFT JOIN users ON posts.id_user = users.id WHERE posts.id_parent is null ORDER BY posts.created DESC LIMIT 10");
        return $results->fetchAll();
    }

    //Selectionne et affiche le détail de l'article de la 'liste article'
    public static function getPostById($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT Posts.*, users.username FROM Posts join users on posts.id_user = users.id WHERE Posts.id = " . $id . " LIMIT 1");
        $tmp = $results->fetchAll();

        if (!empty($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);        
    }    
    
    
    // GESTION DES ARTICLES DANS LE TABLEAU DE LA PAGE ADMINISTRATEUR : 
    // ****************************************************************
    
    // Méthode qui sélectionne les articles avec l'id à l'aide du bouton 'Modifier'
    public static function getPost($id) {
        if (!$id) throw new \Exception("Missing id", 500);
        $results = self::$db->query('SELECT Posts.*, users.username FROM Posts JOIN users on Posts.id_user = users.id WHERE Posts.id = '. $id . ' LIMIT 1');
        $tmp = $results->fetchAll();
        // Récupère dans la BDD la première clé du tableau sélectionné -> l'id sélectionné au clic du bouton
        if (!empty($tmp)) {
            return $tmp[0];
        }
        throw new \Exception("Missing post", 404);
    }

    // Méthode pour modifier un article
    public static function updatePost($id, $id_user, $content, $title = NULL, $chapeau = NULL){
        $results = self::$db -> prepare ('UPDATE posts SET content = ?, title = ?, chapeau = ?, id_user = ? WHERE id = ?');
        $results -> execute ([
            $content,
            $title,
            $chapeau,
            $id_user,
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

    // Sélectionne et récupère les commentaires validés pour le détail article de la liste articles
    public static function getCommentByPost($id_parent) {
        if (!$id_parent) throw new \Exception("Missing id", 500);
        $results = self::$db->query("SELECT content, status FROM posts WHERE id_parent = " . $id_parent . " AND status = '1' ORDER BY id DESC LIMIT 20");
        return $results->fetchAll();
    }

    // Sélectionne et récupère tous les commentaires dans la page admin avec le status = 0
    public static function commentStatusDefault(){
        $results = self::$db->query("SELECT content, id, status FROM posts WHERE status = '0' AND id_parent is not null ORDER BY id DESC");
        return $results->fetchAll();
    }
       
    // Modifie le status du commentaire et le valide
    public static function commentAllowed($id, $status){
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




