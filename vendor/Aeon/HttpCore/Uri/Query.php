<?php

    namespace Aeon\HttpCore\Uri;
    
    class Query
    {
        protected $query;
        
        public function __construct($query)
        {
            $this->set($query);
        }
        
        public function __toString()
        {
            return '?'.$this->query;
        }
        
        public function get()
        {
            return $this->query;
        }
        
        public function set($query)
        {
            if (!is_string($query) || $query === '') {
                throw new \InvalidArgumentException(sprintf(
                    'query argument must be of type string and not empty, "%s" recieved.',
                    is_object($query) ? get_class($query) : gettype($query)
                ));
            }
            
            if (strpos($query, '?') === 0) {
                $query = substr($query, 1);
            }
            
            $this->query = $query;
        }
    }