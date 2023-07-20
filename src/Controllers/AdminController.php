<?php

namespace App\Controllers;

class AdminController extends Controller {

    //Pour afficher les résultats, nous allons tout d'abord vérifier que nous avons bien un "id",
    //ensuite nous exécuterons la requête. Si la requête retourne un résultat, nous l'afficherons.

    // Méthode de saisie des articles
    public function index(){
         $session = new \App\Session();

         // Création des articles sous session
        if (!$session->has("userId")) {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }

        // Vérifie que les données ont bien été envoyées
        // Retourne le nombre d'éléments dans le tableau associatif $_POST
        // Si l'id (en cliquant sur modifier) est supérieur à 0 on modifie sinon on saisi un nouvel article
        $currentUserId = $session->get("userId");
        if (count($_POST)) {
            if (isset($_POST['id']) && $_POST['id'] > 0) {
                \App\Models\Post::updatePost($_POST['id'], $_POST['content'], $_POST['title']);
            } else {
                \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, $currentUserId);
            }
        }
        // Récupère la requête d'insertion des articles et crée un tableau associatif avec les articles et la session
        $posts = \App\Models\Post::getPosts();
        $params = [
            'articles' => $posts,
            'userId' => $session->get("userId")
        ];
        // Appel de la vue
        $this->render('administration.html.twig', $params);

    }

    // Méthode qui supprime un article dans la session
    public function delete($id) {
        $session = new \App\Session();

        if ($session->has("userId")) {
            \App\Models\Post::deletePost($id);
            header("Location: /blogMvc/administration");
        } else {
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

    // Méthode qui modifie un article
    public function edit($id) {
        // Variables pour récupérer les requêtes sur les articles
        $posts = \App\Models\Post::getPosts();
        $post = \App\Models\Post::getPost($id);

        // tableaux associatifs qui envoient les données à la vue
        $params['articles']=$posts;
        $params['article']=$post;

        // Appel de la vue
        $this->render('administration.html.twig', $params);
    }
}
