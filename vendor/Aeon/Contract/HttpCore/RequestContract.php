<?php

    namespace Aeon\Contract\HttpCore;
    
    use \Aeon\Contract\HttpCore\UriContract;
    use \Aeon\Contract\HttpCore\Request\MethodContract;
    
    interface RequestContract
    {
        public function getMethod();
        public function setMethod(MethodContract $method);
        
        public function getUri();
        public function setUri(UriContract $uri);
        
        public function getRequestLine();
        
        public function __toString();
    }