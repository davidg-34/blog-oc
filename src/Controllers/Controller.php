<?php
namespace App\Controllers;
use Twig\Extra\String\StringExtension;


class Controller {

    protected $request;
    protected $session;
    protected $twigLoader;
    protected $twig;

    public function __construct()
    {
        $this->request = new \App\Request();
        $this->session = new  \App\Session();
        $this->twigLoader = new \Twig\Loader\FilesystemLoader('src/templates');
        $this->twig = new \Twig\Environment($this->twigLoader);
        $this->twig->addExtension(new StringExtension());
    }

    public function render($template, $params = [])
    {
        $params["userId"] = $this->session->get("userId");
        $params["userName"] = $this->session->get("userName");
        print_r($this->twig->render($template, $params));
    }

}