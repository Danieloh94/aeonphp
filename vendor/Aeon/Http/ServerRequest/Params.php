<?php

    namespace Aeon\Http\ServerRequest;
    
    class Params
    {
        protected $data;
        
        public function __construct($data = [])
        {
            $this->setAll($data);
        }
        
        public function get($key)
        {
            return $this->has($key) ? $this->data[$key] : null;
        }
        
        public function getAll()
        {
            return $this->data;
        }
        
        public function set($key, $val)
        {
            $this->data[$key] = $val;
        }
        
        public function setAll(array $data)
        {
            $this->data = $data;
        }
        
        public function has($key)
        {
            return array_key_exists($key, $this->data) ? true : false;
        }
    }