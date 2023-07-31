<?php

namespace App\Controllers;

class RegisterController extends Controller {
    
    // Enregistrement d'un utilisateur
    public function index() { 
        // Au moment de la validation du formulaire, enregistrement des données user dans la BDD            
        if (count($_POST)) { 
            // Récupère la classe Request et initialise les 3 clés du tableau params de la méthode getParam
            $request = new \App\Request();
            $username = $request->getParam("username");
            $email = $request->getParam("email");
            $password =  $request->getParam("password");
            
            // Récupère la requête create dans la variable $user
            $user = \App\Models\User::create($username, $email, $password);
            header("Location: /blogMvc/login");  
            die;
        } 
        // Appel de la vue               
        $this->render('register.html.twig');                    
    }
    /* $mail = \App\ */
            // POURQUOI DANS REGISTER IL Y A HEADER() + RENDER ?????
            /* header("Location: /blogMvc/contact");  
            die; */

}