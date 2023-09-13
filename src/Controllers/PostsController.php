<?php

namespace App\Controllers;

class PostsController extends Controller {

    // Méthode qui récupère la liste des articles et la session de l'utilisateur
    public function index() {
        $posts = \App\Models\Post::getPosts();
        // La variable $params récupère les données dans un tableau associatif
        $params = [
            'articles' => $posts,
            'userId' => $this->session->get("userId")
        ];
        // Appel de la vue avec les articles récupérés
        $this->render('home.html.twig', $params);
    }

    // Méthode qui affiche les données
    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }        
        // Condition qui empêche ou autorise la publication du commentaire si l'on est ou pas en session
        if (!$this->session->has("userId")) {
            $user = \App\Models\User::getUser($this->session->get('userId'));            
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

    // Méthode qui insère les commentaires de l'article     
    public function comment($id) {
        // Condition qui empêche ou autorise la publication du commentaire si l'on n'est ou pas en session
        if (!$this->session->has("userId")) {
            $this->render('post.html.twig');
        }else{
            // echo "post id : " . $id;
            $commentId = \App\Models\Post::insertPost($this->request->getParam('comment'), null, $id, $this->session->get("userId"));
            header('Location: /blogMvc/posts/' . $id);
        }
    }

    // Méthode qui insère les articles
    public function post($id){
        if ($this->request->hasParams()) {
            $articleId = \App\Models\Post::insertPost($this->request->getParam('content'), $this->request->getParam('title'), null, $this->session->get("userId"));
        }
        //$articleId = \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, $this->session->get("userId"));
    }

}