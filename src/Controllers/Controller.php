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
        $session = new \App\Session();
        $params["userId"] = $session->get("userId");
        $params["userName"] = $session->get("userName");
        echo $this->twig->render($template, $params);
    }

}