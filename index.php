<?php
require 'vendor/autoload.php';

\App\Models\Database::initDatabase();

$router = new App\Router\Router($_SERVER['REQUEST_URI']);

$router->get('/blogMvc/', 'Posts#index');
$router->get('/blogMvc/posts', function(){ echo "Tous les articles"; });
$router->get('/blogMvc/posts/:id', function($id){ echo "Afficher l'article " . '<b>' . $id . '</b>'; });
$router->post('/blogMvc/posts/:id', function($id){ echo "Poster pour l'article " . '<b>' . $id . '</b>'; });
$router->post('blogMvc/posts/:id/comment', 'Posts#comment');
$router->run(); 

/* TODO LIST

* le index.php devrait être dans un repertoire public qui serait le document_root (sécurité)
* dans Databae, les parametres de connextion doivent etre dans un .env (securite)
* trier les posts par date decroissante dans models/posts

*/