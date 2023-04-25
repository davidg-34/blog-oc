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
   
//******************** */

    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        $article = \App\Models\Post::getPostById($id);
        // print_r($article);
        // die;
        $params = [
            "article" => $article
        ];
        $this->render('post.html.twig', $params);                    
    }

    public function comment($id) {
        echo "post id : " . $id;
        print_r($_POST);
        die();        
    }

    

   /*  public function show($slug, $id){
        echo "je suis l'article $id ";        
    } */
}
