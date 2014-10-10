<?php

namespace InfoContact\IcFwk;

class Route {

    private $name;
    private $url;
    private $module;
    private $action;
    private $varsNames;
    private $vars = [];

    public function __construct($name, $url, $module, $action, $varsNames) {
        $this->setName($name);
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getModule() {
        return $this->module;
    }

    public function getAction() {
        return $this->action;
    }

    public function getVarsNames() {
        return $this->varsNames;
    }

    public function getVars() {
        return $this->vars;
    }

    private function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    private function setUrl($url) {
        if (is_string($url)) {
            $this->url = $url;
        }
    }

    private function setModule($module) {
        if (is_string($module)) {
            $this->module = $module;
        }
    }

    private function setAction($action) {
        if (is_string($action)) {
            $this->action = $action;
        }
    }

    private function setVarsNames(array $varsNames) {
        $this->varsNames = $varsNames;
    }

    public function setVars(array $vars) {
        $this->vars = $vars;
    }

    public function hasVars() {
        return !empty($this->varsNames);
    }

    public function match($url) {
        if (preg_match('`^' . $this->url . '$`', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }

}
