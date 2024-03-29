<?php

namespace App\Router;

class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;        
    }

    public function get($path, $callable, $name = null){
        $route = new Route($path, $callable, $name);
        $this->routes['GET'][] = $route;
        return $route;
    }
    
    public function post($path, $callable, $name = null){
        $route = new Route($path, $callable, $name);
        $this->routes['POST'][] = $route;
        return $route;
    }

    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run(){
        /* echo '<pre>';
            echo print_r($this->routes);
        echo '</pre>'; */

        $request = new \App\Request();

        if(!isset($this->routes[$request->getServerProp('REQUEST_METHOD')])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$request->getServerProp('REQUEST_METHOD')] as $route){
            if ($route->match($this->url)){
                return $route->call();
            }
        } 
        throw new RouterException('no matching routes');
    } 

    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('no route matches this name');
        }

        return $this->namedRoutes[$name]->getUrl($params);
    }

}    
