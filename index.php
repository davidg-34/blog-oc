<?php
require 'vendor/autoload.php';

\App\Models\Database::initDatabase();

$router = new App\Router\Router($_SERVER['REQUEST_URI']);

$router->get('/blogMvc/', 'Posts#index');
$router->get('/blogMvc/posts', function(){ echo "<h3>LISTE DES ARTICLES :</h3>"; });
$router->get('/blogMvc/posts/:id', 'Posts#show');
$router->post('/blogMvc/posts', 'Posts#post');

$router->post('/blogMvc/posts/:id', 'Posts#comment');
$router->post('blogMvc/posts/:id/comment', 'Posts#comment');
$router->post('blogMvc/posts/:parent_id/comment', 'Posts#comment'); 
//$router->post('blogMvc/posts/:login', 'Posts#login'); 


// Routes de connexion :
$router->get('/blogMvc/register', 'Register#index');
$router->post('/blogMvc/register', 'Register#index');

$router->get('/blogMvc/login', 'Login#index');
$router->post('/blogMvc/login', 'Login#index');


$router->get('/blogMvc/logout', 'Logout#index');
$router->post('/blogMvc/logout', 'Logout#index');


// Routes session 
$router->get('/blogMvc/session', 'Session#index');
$router->post('/blogMvc/session', 'Session#index');


// Routes tableau de bord / dashboard / administration
$router->get('/blogMvc/administration', 'Admin#index');
$router->post('/blogMvc/administration', 'Admin#index');

//$router->get('/blogMvc/administration/post/:id', 'Post#show');
//$router->post('/blogMvc/administration/post/:id', 'Post#show');


$router->run(); 
 
/* TODO LIST

* le index.php devrait être dans un repertoire public qui serait le document_root (sécurité)
* dans Database, les parametres de connexion doivent etre dans un .env (securite)
* trier les posts par date decroissante dans models/posts

*/