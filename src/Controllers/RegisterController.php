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
            $user = \App\Models\User::create($lastname, $email, $password);
            header("Location: /blogMvc/login");  
            die;
        }                
        $this->render('register.html.twig', /* $params */);                    
    }
    

    /* public function register($lastname, $email, $password) {
        $registration = \App\Models\User::insertRegister($_POST['lastname'], $_POST['email'], $_POST['password'], $lastname, $email, $password, 21); 
        return $registration;     
    } */
     

}