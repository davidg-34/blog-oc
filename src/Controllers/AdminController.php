<?php

namespace App\Controllers;

class AdminController extends Controller {    
    
    public function index(){
        
        $session = new \App\Session();
        $posts = \App\Models\Post::getPosts();
        //echo '<pre>';
        //print_r($session);        
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
                //if $id > 0{
                    // $updateId = \App\Models\Post::updatePost();
                    // update
                //}else{
                    $articleId = \App\Models\Post::insertPost($_POST['content'], $_POST['title'], null, 21);

                }
                //echo '<pre>';
                //  print_r($articleId);        
                //die;
            //}               
            
        }else{
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }

    public function delete($id){        
        $session = new \App\Session();
        
        if ($session->has("userId")) {
            $deleteId = \App\Models\Post::deletePost($id);  
            header("Location: /blogMvc/administration");
        }else{
            header("Location: /blogMvc/");
            throw new \Exception("Vous devez être connecté");
        }
    }
    
    /* public function edit($id){
        $session = new\App\Models\Post::postUpdate($id);
        $posts = App\Models\Posts::getPost();
        $post = \App\Models\Posts::updatePost();

        $params[
            'post' => $post,
            'posts' => $posts
        ];
        $this->render('administration.html.twig', $params);
    } */
}