<?php

namespace App;

class Request 
{
    private ?array $params = [];
    
    public function __construct()
    {        
        $safeGet = filter_input_array(INPUT_GET);
        if (!is_array($safeGet)) $safeGet = [];
        $safePost = filter_input_array(INPUT_POST);
        if (!is_array($safePost)) $safePost = [];
        $this->params = count($safePost) ? $safePost : $safeGet;        
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
}