<?php

namespace InfoContact\IcFwk\Router;

class Router {
    
    private $routes = [];
    const NO_ROUTE = 1;
    
    public function addRoute(\InfoContact\IcFwk\Router\Route $route) {
        if(!in_array($route, $this->routes)) {
            $this->routes[] = $route;
        }
    }
    
    public function getRoute($url) {
        /* @var $route \InfoContact\IcFwk\Router\Route */
        foreach ($this->routes as $route) {
            if(($varsValues = $route->match($url)) !== false) {
                $route->setVars($varsValues);
                return $route;
            }
        }
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
    
    public function generate($name, $params = []) {
        /* @var $route \InfoContact\IcFwk\Router\Route */
        foreach ($this->routes as $route) {
            if($name == $route->getName()) {
                return $route->generateUrl($params);
            }
        }
    }
    
}
