<?php

namespace App\Controllers;

class PostsController extends Controller {
    
    public function index() {        
        $posts = \App\Models\Post::getPosts();
        // print_r($posts);
        $params = [
            'articles' => $posts
        ];
        $this->render('home.html.twig', $params);                    
    }


    public function comment(){
        echo 'Votre commentaire :';
    }

    

   /*  public function show($slug, $id){
        echo "je suis l'article $id ";        
    } */
}
