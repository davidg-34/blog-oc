<?php

namespace App\Controllers;

class AdminController extends Controller {

    //Pour afficher les résultats, nous allons tout d'abord vérifier que nous avons bien un "id",
    //ensuite nous exécuterons la requête. Si la requête retourne un résultat, nous l'afficherons.

    // Méthode qui saisie des articles ou les modifie
    public function index(){
         $session = new \App\Session();
         // Création des articles sous session
        if (!$session->has("userId")) {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
        // Vérifie que les données ont bien été envoyées/ lit le nombre de soumissions de messages
        // Si l'id (en cliquant sur modifier) est supérieur à 0 on modifie sinon on saisi un nouvel article
        $currentUserId = $session->get("userId");
        print_r($this->request->hasParams());
        if ($this->request->hasParams()) {
            if ($this->request->getParam('id') > 0) {
                \App\Models\Post::updatePost($this->request->getParam('id'), $this->request->getParam('id_user'), $this->request->getParam('content'), $this->request->getParam('title'), $this->request->getParam('chapeau'));
            } else {
                \App\Models\Post::insertPost($this->request->getParam('content'), $this->request->getParam('title'), null, $currentUserId, $this->request->getParam('chapeau'));
            } 
        }       
        // Affiche les données dans un tableau associatif [articles, session, utilisateur, commentaires]
        $posts = \App\Models\Post::getPosts();
        $comments = \App\Models\Post::commentStatusDefault();
        $username = \App\Models\User::getUser();
        $params = [
            'articles'  => $posts,
            'userId'    => $session->get("userId"),
            'comments'  => $comments,
            'username'  => $username
        ];
        // Appel de la vue avec les données en second paramètre.
        $this->render('administration.html.twig', $params);

    }

    // Méthode pour modifier des données
    public function edit($id) {
        // Variables pour récupérer les requêtes sur les articles.
        $posts = \App\Models\Post::getPosts();
        $post = \App\Models\Post::getPost($id);
        $authors = \App\Models\User::getAuthors();

        // Stocke les variables dans un tableau associatif pour les envoyer à la vue
        $params = [
            "articles"  => $posts,
            "article"   => $post,
            "authors"   => $authors         
        ];        
        $this->render('administration.html.twig', $params);
    } 
   
    // Méthode pour valider un commentaire dans la session
    public function validate($id) {
        $session = new \App\Session();
        
        if ($session->has('userId')){
            \App\Models\Post::commentAllowed($id, $status);
            header("Location: /blogMvc/administration");
        } else {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

    // Méthode pour rejeter un commentaire dans la session
    public function reject($id) {
        $session = new \App\Session();
        
        if ($session->has('userId')){
            \App\Models\Post::commentBan($id, $status);
            header("Location: /blogMvc/administration");
        } else {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

    // Méthode qui supprime un article dans la session.
    public function delete($id) {
        $session = new \App\Session();

        if ($session->has("userId")) {
            \App\Models\Post::deletePost($id);;
            header("Location: /blogMvc/administration");
        } else {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

         
}
