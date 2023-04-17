<?php
namespace App\Controllers;

class Controller {

    protected $twigLoader;
    protected $twig;

    public function __construct() 
    {
        $this->twigLoader = new \Twig\Loader\FilesystemLoader('src/templates');
        $this->twig = new \Twig\Environment($this->twigLoader);
    }

    public function render($template, $params = []) 
    {
        echo $this->twig->render($template, $params);
    }

}