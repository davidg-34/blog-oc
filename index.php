<?php
require 'vendor/autoload.php';

/* print_r($_SERVER); */


$router = new App\Router\Router($_SERVER['REQUEST_URI']);

$router->get('/blogMvc/', 'Posts#index');
$router->get('/blogMvc/posts', function(){ echo "Tous les articles"; });
$router->get('/blogMvc/posts/:id', function($id){ echo "Afficher l'article " . '<b>' . $id . '</b>'; });

$router->post('/blogMvc/posts/:id', function($id){ echo "Poster pour l'article " . '<b>' . $id . '</b>'; });

$router->get('blogMvc/comment', 'Posts#comment');

$router->run(); 




   /*/:id'function("$id"){  ?>
    <form action="" method="post">
        <input type="text" name="name">
        <button type="submit">Envoyer</button>
    
    </form> }
    <?php
 */
