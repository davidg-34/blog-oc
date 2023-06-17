<?php

namespace App\Controllers;

class AdminController extends Controller {    
    
    public function index(){
        $session = new \App\Session();
        // Si l'utilisateur est déjà inscrit renvoi vers la page ..
        if ($session->has("userId")) {
            $this->render('administration.html.twig');
        }else{
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

}