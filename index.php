<?php
require 'vendor/autoload.php';

\App\Models\Database::initDatabase();

$router = new App\Router\Router($_SERVER['REQUEST_URI']);


// Route accueil du site
$router->get('/blogMvc/', 'Homepage#index');

$router->get('/blogMvc/blog', 'Posts#index');
// $router->post('/blogMvc/homepage', 'Homepage#index');

// Routes des articles
$router->get('/blogMvc/posts', function(){ echo "<h3>LISTE DES ARTICLES :</h3>"; });
$router->get('/blogMvc/posts/:id', 'Posts#show');
$router->post('/blogMvc/posts', 'Posts#post');

// Routes des commentaires
$router->post('/blogMvc/posts/:id', 'Posts#comment');
$router->post('blogMvc/posts/:id/comment', 'Posts#comment');
$router->post('blogMvc/posts/:parent_id/comment', 'Posts#comment');

// Routes de connexion :
$router->get('/blogMvc/register', 'Register#index');
$router->post('/blogMvc/register', 'Register#index');

$router->get('/blogMvc/login', 'Login#index');
$router->post('/blogMvc/login', 'Login#index');

// Routes déconnexion
$router->get('/blogMvc/logout', 'Logout#index');
$router->post('/blogMvc/logout', 'Logout#index');

// Routes session
$router->get('/blogMvc/session', 'Session#index');
$router->post('/blogMvc/session', 'Session#index');


// Routes tableau de bord 
$router->get('/blogMvc/administration', 'Admin#index');
$router->post('/blogMvc/administration', 'Admin#index');

// Routes mise à jour et suppression d'un article dans le tableau de bord
$router->post('/blogMvc/administration/posts/:id/edit', 'Admin#index');
$router->get('/blogMvc/administration/posts/:id/edit', 'Admin#edit');
$router->get('/blogMvc/administration/posts/:id/delete', 'Admin#delete');
$router->get('/blogMvc/administration/posts/:id/reject', 'Admin#reject');



// Routes messagerie contact
$router->get('/blogMvc/contact', 'Contact#index');
$router->post('/blogMvc/contact', 'Contact#index');



$router->run();

