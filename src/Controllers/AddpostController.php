<?php

namespace App\Controllers;

class AddpostController extends Controller {    
    
    public function index(){
        $session = new \App\Session();
        // Si l'utilisateur est déjà inscrit renvoi vers la page ..
        if ($session->has("userId")) {
            $this->render('addpost.html.twig');
        }else{
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

}