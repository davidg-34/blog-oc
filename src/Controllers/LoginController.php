<?php

namespace App\Controllers;

class LoginController extends Controller {
    
    public function index() {  
        
        $session = new \App\Session();
        // Si l'utilisateur est déjà inscrit renvoi vers la page article/accueil
        if ($session->has("userId")) {
            header("Location: /blogMvc/");
            die;
        } 

        // Récupère dans un tableau les clés et valeurs de la saisie du formulaire de connexion  
        $params = [];
        // ??
        if (count($_POST)) {             
            $request = new \App\Request();
            // Récupère dans des variables les données du formulaire 
            $email = $request->getParam("email");            
            $password =  $request->getParam("password");
            
            
            // Appel du model qui récupère la fonction authenticate dans la variable $user
            $user = \App\Models\User::authenticate($email, $password);
            if ($user) {
                // Met les données de l'utilisateur en session
                $session->set('userId', $user['id']);
                $session->set('userEmail', $user['email']);
                $session->set('userName', $user['lastname']);
                
                header("Location: /blogMvc/");// Renvoi vers la page accueil/article
                die;
            }
            // Si les données ne correspondent pas à la BDD : "identifications invalides"   
            $params['error'] = "invalid credentials";
        }
        // Appel de la vue (page connexion) avec les données récupérés dans variable $params
        $this->render('login.html.twig', $params);                     
    }

    // Souhaiter la bienvenue avec ce bloc de succès
    /* div class="alert alert-success" role="alert">
         Bonjour <?= echo $_SESSION['lastname']; ?> et bienvenue sur le site !
    </div> */
}