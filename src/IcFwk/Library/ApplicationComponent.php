<?php

namespace InfoContact\IcFwk\Library;

abstract class ApplicationComponent {
    
    protected $app;
    
    public function __construct(\InfoContact\IcFwk\Library\Application $app) {
        $this->app = $app;
    }
    
}
