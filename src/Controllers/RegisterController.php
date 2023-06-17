<?php

namespace App\Controllers;

class RegisterController extends Controller {
    
    // Méthode 
    public function index() {             
        if (count($_POST)) { 
            $request = new \App\Request();
            $lastname = $request->getParam("lastname");
            $email = $request->getParam("email");
            $password =  $request->getParam("password");
            
            // Appel du model qui récupère la fonction create dans la variable $user
            $user = \App\Models\User::create($lastname, $email, $password);
            header("Location: /blogMvc/login");  
            die;
        }                
        $this->render('register.html.twig', /* $params */);                    
    }
    

}