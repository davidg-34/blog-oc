<?php

namespace App\Controllers;

class PostsController extends Controller {
    
    // Méthode qui récupère les données de la liste articles
    public function index() {        
        $posts = \App\Models\Post::getPosts();
        echo '<pre>';
         print_r($posts);
        echo '</pre>';
        die();
        $params = [
            'articles' => $posts
        ];
        // Appel de la vue avec les articles récupérés
        $this->render('home.html.twig', $params);
    }
    
    // Méthode présentant les commentaires liés à un article
    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        
        // initialisations de variables récupérant l'id de l'article et des commentaires
        $article = \App\Models\Post::getPostById($id);
        $comments = \App\Models\Post::getCommentByPost($id);
         //echo '<pre>';
         //  print_r($comments);        
         //die;
         // Récupération des données de l'article et des commentaires
        $params = [
            "article" => $article, 
            "comments" => $comments
        ];
        //echo '<pre>';
        //   print_r($comments);        
        //die;

        //Appel de la vue des commentaires récupérés
        $this->render('post.html.twig', $params);                    
    }

    /* public function comment($id) {
        echo "post id : " . $id;
        $commentId = \App\Models\Post::insertPost($_POST['comment'], null, $id, 21);      
    } */
/****************************************************************** */
    /* public function commentedShow($id_parent) {
        if (!$id_parent) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        // print_r($article);
        // die;
        $params = [ 
            "commentPost" => $commentPost
        ];
        $this->render('post.html.twig', $params);                    
    } */
/******************************************************************* */
    /* public function commentShow($id_parent) {
        echo "post id_parent : " . $id_parent;
        $id_parent = \App\Models\Post::getCommentByPost($_POST['comment'], null, $id_parent, 21);      
    } */

}