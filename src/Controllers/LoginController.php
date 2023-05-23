<?php

namespace App\Controllers;

class LoginController extends Controller {
    
    public function index() {      
        $session = new \App\Session();
        if ($session->has("userId")) {
            // already authenticated 
            header("Location: /blogMvc/");
            die;
        }     
        $params = [];     
        if (count($_POST)) { 
            $request = new \App\Request();
            $email = $request->getParam("email");
            $password =  $request->getParam("password");
            $user = \App\Models\User::authenticate($email, $password);
            if ($user) {
                $session->set('userId', $user['id']);
                $session->set('userEmail', $user['email']);
                $session->set('userName', $user['lastname']);
                header("Location: /blogMvc/");
                die;
            }  
            $params['error'] = "invalid credentials";
        }
        $this->render('login.html.twig', $params);                    
    }
}