<?php

namespace InfoContact\IcFwk;


class Route {

    private $name;
    private $url;
    private $module;
    private $action;
    private $varsNames;
    private $vars = [];

    /**
     * Initialise une nouvelle route
     * @param string $name Nom de la route
     * @param string $url URL de la route
     * @param string $module Module de la route
     * @param string $action Action de la route
     * @param string $varsNames Noms des variables de la route
     */
    public function __construct($name, $url, $module, $action, $varsNames) {
        $this->setName($name);
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }

    /**
     * @return string Nom de la route
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string URL de la route
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @return string Module de la route
     */
    public function getModule() {
        return $this->module;
    }

    /**
     * @return string Action de la route
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @return array Nom des variables de la route 
     */
    public function getVarsNames() {
        return $this->varsNames;
    }

    /**
     * @return array Variables de la route
     */
    public function getVars() {
        return $this->vars;
    }

    /**
     * @param string $name Nom de la route
     * @throws \RuntimeException
     */
    private function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        } else {
            throw new \RuntimeException("Le nom de route doit être une chaîne de caractères");
        }
    }

    /**
     * @param string $url URL de la route
     * @throws \RuntimeException
     */
    private function setUrl($url) {
        if (is_string($url)) {
            $this->url = $url;
        } else {
            throw new \RuntimeException("L'url de la route doit être une chaîne de caractères");
        }
    }

    /**
     * @param string $module Module de la route
     * @throws \RuntimeException
     */
    private function setModule($module) {
        if (is_string($module)) {
            $this->module = $module;
        } else {
            throw new \RuntimeException("Le module de la route doit être une chaîne de caractères");
        }
    }

    /**
     * @param string $action Action de la route
     * @throws \RuntimeException
     */
    private function setAction($action) {
        if (is_string($action)) {
            $this->action = $action;
        } else {
            throw new \RuntimeException("Le'action de la route doit être une chaîne de caractères");
        }
    }

    /**
     * @param array $varsNames Noms des variables de la route
     * @throws \RuntimeException
     */
    private function setVarsNames(array $varsNames) {
        if(is_array($varsNames)) {
            $this->varsNames = $varsNames;
        } else {
            throw new \RuntimeException("Les noms de variable de la route doivent être passés sous forme de tableau");
        }
    }

    /**
     * @param array $vars Variables de la route
     * @throws \RuntimeException
     */
    public function setVars(array $vars) {
        if(is_array($vars) && empty($this->vars)) {
            if($this->hasVars()) {
                foreach ($vars as $key => $match) {
                    // La première valeur contient entièrement la chaine capturée (voir la doc sur preg_match).
                    if ($key !== 0) {
                        $this->vars[$this->varsNames[$key - 1]] = $match;
                    }
                }
            }
        } else {
            throw new \RuntimeException("Conflit sur les variables de route");
        }
    }

    /**
     * @return bool Indique l'existance de variables pour la route
     */
    public function hasVars() {
        return !empty($this->varsNames);
    }

    /**
     * @param string $url URL de test
     * @return boolean|array Correspond au pattern ou non<br/>
     * Si oui, les correspondances sont retournées
     */
    public function match($url) {
        $matches = [];
        if (preg_match('`^' . $this->url . '$`', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }

}
