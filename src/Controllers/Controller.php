<?php
namespace App\Controllers;
use Twig\Extra\String\StringExtension;


class Controller {

    protected $request;
    protected $twigLoader;
    protected $twig;

    public function __construct()
    {
        $this->request = new \App\Request();
        $this->twigLoader = new \Twig\Loader\FilesystemLoader('src/templates');
        $this->twig = new \Twig\Environment($this->twigLoader);
        $this->twig->addExtension(new StringExtension());
    }

    public function render($template, $params = [])
    {
        $session = new \App\Session();
        $params["userId"] = $session->get("userId");
        $params["userName"] = $session->get("userName");
        echo $this->twig->render($template, $params);
    }

}