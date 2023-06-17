<?php

namespace App\Controllers;

class PostsController extends Controller {
    
    // Appel de la méthode qui récupère la liste des articles et la session de l'utilisateur
    public function index() {        
        $posts = \App\Models\Post::getPosts();
        $session = new \App\Session(); ///* !!!!!! */       
        
        //echo '<pre>';
        // print_r($posts);
        //echo '</pre>';
        //die();

        $params = [
            'articles' => $posts,
            'userId' => $session->get("userId") ///* !!!!!!! */
        ];
        
        // Appel de la vue avec les articles récupérés
        $this->render('home.html.twig', $params);
    }
    
    // Méthode présentant 
    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        
        // Variables récupérant l'article et les commentaires en appelant l'id 
        $article = \App\Models\Post::getPostById($id);
        $comments = \App\Models\Post::getCommentByPost($id);
        //echo '<pre>';
        //  print_r($article);        
        //die;
         
         // Tableau associatif qui envoie les données de l'article et des commentaires à la vue
        $params = [
            "article" => $article, 
            "comments" => $comments
        ];
        //echo '<pre>';
        //   print_r($comments);        
        //die;

        //Appel de la vue 
        $this->render('post.html.twig', $params);                    
    }

    public function comment($id) {
        echo "post id : " . $id;
        $commentId = \App\Models\Post::insertPost($_POST['comment'], null, $id, 21);      
    }

    public function post($id){
        $articleId = \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, 21);
    }

}