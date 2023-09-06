<?php

namespace App\Controllers;

class LoginController extends Controller {
    
    public function index() {  
        
        $session = new \App\Session();
        // Si l'utilisateur est déjà inscrit renvoi vers la page accueil
        if ($session->has("userId")) {
            header("Location: /blogMvc/");            
        } else {            
            if ($this->request->hasParams()) {             
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
                    $session->set('userName', $user['username']);
                    $session->set('userRole', $user['role']);                    
                    header("Location: /blogMvc/administration");// Renvoi vers la page administration                    
                } else {
                    // Si les données ne correspondent pas à la BDD : "identifications invalides"                       
                    $this->render('login.html.twig', ['error' => "identifiant ou mot de passe incorrect"]);                     
                }
            } else {
                $this->render('login.html.twig');                     
            }                        
        }
    }
    
}