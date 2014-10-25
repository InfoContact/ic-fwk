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
        foreach ($this->routes as $route) {
            if(($varsValues = $route->match($url)) !== false) {
                $route->setVars($varsValues);
                return $route;
            }
        }
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
    
}
