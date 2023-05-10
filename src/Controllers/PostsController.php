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
   


    public function show($id) {
        if (!$id) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        $article = \App\Models\Post::getPostById($id);
        $comments = \App\Models\Post::getCommentByPost($id);
        // print_r($article);
        // die;
        $params = [
            "article" => $article, 
            "comments" => $comments
        ];
        $this->render('post.html.twig', $params);                    
    }

    public function comment($id) {
        echo "post id : " . $id;
        $commentId = \App\Models\Post::insertPost($_POST['comment'], null, $id, 21);      
    }
/****************************************************************** */
    public function commentedShow($id_parent) {
        if (!$id_parent) {
            throw new \Exception("Ce post n'existe pas", 404);
        }
        // print_r($article);
        // die;
        $params = [ 
            "commentPost" => $commentPost
        ];
        $this->render('post.html.twig', $params);                    
    }
/******************************************************************* */
    public function commentShow($id_parent) {
        echo "post id_parent : " . $id_parent;
        $id_parent = \App\Models\Post::getCommentByPost($_POST['comment'], null, $id_parent, 21);      
    }

}
