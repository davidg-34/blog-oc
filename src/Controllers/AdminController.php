<?php

namespace App\Controllers;

class AdminController extends Controller {    
    
    public function index(){
        
        $session = new \App\Session();
        $posts = \App\Models\Post::getPosts();
        //echo '<pre>';
        //print_r($posts);        
        //die;

        $params = [
            'articles' => $posts,
            'userId' => $session->get("userId") 
        ];

        $this->render('administration.html.twig', $params);
        //echo '<pre>';
        //print_r($params);
        //echo '</pre>';
        //die;            

        if ($session->has("userId")) {            
            if(count($_POST)){
                $articleId = \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, 21);
                //echo '<pre>';
                //  print_r($articleId);        
                //die;
            }               
            
        }else{
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }


}