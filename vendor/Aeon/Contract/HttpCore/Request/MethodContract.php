<?php

    namespace Aeon\Contract\HttpCore\Request;
    
    interface MethodContract
    {
        public function __toString();
        
        public function get();
        public function set($method);
    }