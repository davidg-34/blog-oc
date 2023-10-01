<?php

namespace App;

// gère les requêtes des formulaires via les variables globales GET et POST 

class Request {
    private ?array $params = [];

    private $server;
    
    // Méthode qui récupère et filtre les valeurs des variables GET et POST en sortie de formulaire
    public function __construct() {
        $this->server = (isset($_SERVER)) ? $_SERVER : null;
        $safeGet = filter_input_array(INPUT_GET);
        if (isset($safeGet['url'])) unset($safeGet['url']);
        //print_r($safeGet);
        if (!is_array($safeGet)) $safeGet = [];
        $safePost = filter_input_array(INPUT_POST);
        if (!is_array($safePost)) $safePost = [];
        $this->params = count($safePost) ? $safePost : $safeGet; 
    }
    
    public function hasParams() {
        //print_r($this->params);
        return !empty($this->params);
       
    }

    public function hasParam($key) {
        return isset($this->params[$key]);
    }

    public function getParam($key) {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        
        return null;
    }

    public function getParams() {
        return $this->params;
    }

    public function getServerProp($property) {
        return isset($this->server[$property]) ? $this->server[$property] : null;
    }
    
}