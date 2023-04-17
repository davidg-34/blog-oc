<?php

namespace App\Controller;

class PostsController {
    
    public function index(){
        echo 'Page Accueil : ' . '<b>' . 'PostController' . '</b>';
        $loader = new \Twig\Loader\FilesystemLoader('src/template');
        $twig = new \Twig\Environment($loader,);
        $template = $twig->load('home.html.twig');
        echo $template->render(['the' => 'variables', 'go' => 'here']);
        
        /* require 'server.php'; */
        /* $requete = $bdd->query("SELECT title, content, created");
        $articles = $requete->fetchAll();
        echo $template->render('template/home.html.twig', ['articles' => $articles, 'go' => 'here']); */
    }


    public function comment(){
        echo 'Votre commentaire :';
    }

       
    
    

   /*  public function show($slug, $id){
        echo "je suis l'article $id ";        
    } */
}


/* class PostsController {
    public function show($slug, $id){
        echo "je suis l'article $id Je suis en page" . $_GET['page'];        
    }
} */
