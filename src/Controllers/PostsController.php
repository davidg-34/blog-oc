<?php

namespace App\Controllers;

class PostsController extends Controller {
    
    // Méthode qui récupère la liste des articles et la session de l'utilisateur
    public function index() {        
        $posts = \App\Models\Post::getPosts();
        $session = new \App\Session();      
        
        // La variable $params récupère les données dans un tableau associatif
        $params = [
            'articles' => $posts,
            'userId' => $session->get("userId")
        ];
        
        // Appel de la vue avec les articles récupérés
        $this->render('home.html.twig', $params);
    }
    
    // Méthode présentant les données  
    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        
        // Initialisation des variables
        $article = \App\Models\Post::getPostById($id);
        $comments = \App\Models\Post::getCommentByPost($id);
                 
         // Tableau associatif qui permet l'envoie les données de l'article et des commentaires à la vue
        $params = [
            "article" => $article, 
            "comments" => $comments
        ];
        
        //Appel de la vue avec les données du tableau en paramètre
        $this->render('post.html.twig', $params);                    
    }

    // Méthode qui
    public function comment($id) {
        echo "post id : " . $id;
        $commentId = \App\Models\Post::insertPost($_POST['comment'], null, $id, 21);      
    }

    // Méthode qui
    public function post($id){
        $articleId = \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, 21);
    }

}