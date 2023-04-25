<?php
require 'vendor/autoload.php';

\App\Models\Database::initDatabase();

$router = new App\Router\Router($_SERVER['REQUEST_URI']);

$router->get('/blogMvc/', 'Posts#index');
$router->get('/blogMvc/posts', function(){ echo "Tous les articles"; });
$router->get('/blogMvc/posts/:id', 'Posts#show');
$router->post('/blogMvc/posts/:id', 'Posts#comment');
$router->post('blogMvc/posts/:id/comment', 'Posts#comment');


$router->run(); 
 
/* TODO LIST

* le index.php devrait être dans un repertoire public qui serait le document_root (sécurité)
* dans Database, les parametres de connexion doivent etre dans un .env (securite)
* trier les posts par date decroissante dans models/posts

*/