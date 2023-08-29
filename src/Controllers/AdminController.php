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
        // Retourne le nombre d'éléments dans le tableau associatif $_POST
        $currentUserId = $session->get("userId");
        if (count($_POST)) {
            if (isset($_POST['id']) && $_POST['id'] > 0) {
                \App\Models\Post::updatePost($_POST['id'], $_POST['id_user'], $_POST['content'], $_POST['title'], $_POST['chapeau']);
                // \App\Models\Post::commentValidate($_POST['id'], $_POST['status']);
                // \App\Models\User::updateUser($_POST['id'], $_POST['username']);
            } else {
                \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, $currentUserId, $_POST['chapeau']);
            }
        }
        
        // Affiche les données dans un tableau associatif [articles, session, utilisateur, commentaires]
        $posts = \App\Models\Post::getPosts();
        $comments = \App\Models\Post::commentStatusDefault();
        $username = \App\Models\User::getUser();
        $params = [
            'articles' => $posts,
            'userId' => $session->get("userId"),
            'comments' => $comments,
            'username' => $username
        ];
        //print_r($username);
        // Appel de la vue avec les données en second paramètre
        $this->render('administration.html.twig', $params);

    }

    // Méthode pour modifier des données
    public function edit($id) {
        // Variables pour récupérer les requêtes sur les articles
        $posts = \App\Models\Post::getPosts();
        $post = \App\Models\Post::getPost($id);
        $authors = \App\Models\User::getAuthors();
        // $status = \App\Models\Post::commentStatus();
        // Stocke les variables dans un tableau associatif pour les envoyer à la vue
        $params = [
            "articles" => $posts,
            "article" => $post,
            "authors" => $authors 
            // "status" => $status            
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
    

    // Méthode qui supprime un article dans la session
    public function delete($id) {
        $session = new \App\Session();

        if ($session->has("userId")) {
            \App\Models\Post::deletePost($id);
            \App\Models\Post::deleteComment($id);
            header("Location: /blogMvc/administration");
        } else {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

         
}
