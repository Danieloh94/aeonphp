<?php

    namespace Aeon\Contract\HttpCore\Uri;
    
    interface PathContract
    {
        public function __toString();
        
        public function get();
        
        public function set($path);
    }