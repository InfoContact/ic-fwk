<?php

namespace InfoContact\IcFwk;

class Router {
    
    private $routes = [];
    const NO_ROUTE = 1;
    
    public function addRoute(\InfoContact\IcFwk\Route $route) {
        if(!in_array($route, $this->routes)) {
            $this->routes[] = $route;
        }
    }
    
    public function getRoute($url) {
        /**
         * @var \InfoContact\IcFwk\Route $route
         */
        foreach ($this->routes as $route) {
            if(($varsValues = $route->match($url)) !== false) {
                
            }
        }
    }
}
