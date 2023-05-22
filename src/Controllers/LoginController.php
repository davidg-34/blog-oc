<?php

namespace App\Controllers;

class LoginController extends Controller {
    
    public function index() {        
        
        // print_r($login);
        /* $params = [
            'register' => $user
        ]; */
        $this->render('login.html.twig');                    
    }
   


}