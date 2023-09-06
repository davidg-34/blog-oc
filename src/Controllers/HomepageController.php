<?php

namespace App\Controllers;

class HomepageController extends Controller {
    
    // Méthode qui va chercher la homepage
    public function index() {   
        $this->render('homepage.html.twig');
    }

}