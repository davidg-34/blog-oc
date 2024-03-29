<?php

namespace App\Controllers;

class LogoutController extends Controller {
    
    public function index() {
        
        $session = new \App\Session();        

        if ($session->has("userId")) {
            session_unset();
            session_destroy();            
        } 
        header('Location: /blogMvc/');
    }                     

}
