<?php

namespace InfoContact\IcFwk\Router;

class Router {
    
    /** @var array $routes Liste des routes de l'application */
    static private $routes = [];
    const NO_ROUTE = 1;
    
    /**
     * Ajoute une route dans la liste des routes
     * @param \InfoContact\IcFwk\Router\Route $route La route à ajouté
     * @return void
     */
    static public function addRoute(\InfoContact\IcFwk\Router\Route $route) {
        if(!in_array($route, self::$routes)) {
            $this->routes[] = $route;
        }
    }
    
    /**
     * Retourne la route correspondant à l'URL passée en paramètre
     * @param string $url L'URL dont on souhaite connaitre la route correspondante
     * @return \InfoContact\IcFwk\Router\Route L'ojet route correspondant
     * @throws \RuntimeException 
     */
    static public function getRoute($url) {
        /* @var $route \InfoContact\IcFwk\Router\Route */
        foreach ($this->routes as $route) {
            if(($varsValues = $route->match($url)) !== false) {
                $route->setVars($varsValues);
                return $route;
            }
        }
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
    
    /**
     * Génère l'URL de la route dont les nom et les paramètres sont transmis
     * @param string $name Nom de la route
     * @param array $params Paramètre de la route
     * @return string URL générée
     * @throws \RuntimeException
     */
    static public function generate($name, $params = []) {
        /* @var $route \InfoContact\IcFwk\Router\Route */
        foreach ($this->routes as $route) {
            if($name == $route->getName()) {
                return $route->generateUrl($params);
            }
        }
        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
    
}
