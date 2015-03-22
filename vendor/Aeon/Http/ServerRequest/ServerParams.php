<?php

    namespace Aeon\Http\ServerRequest;
    
    use \Aeon\Http\ServerRequest\Params;
    
    class ServerParams extends Params
    {
        public function __construct(array $data = [])
        {
            parent::__construct($this->normalize($data));
        }
        
        public function normalize($data)
        {
            $sorted = [];
            foreach ($data as $key => $value) {
                $sorted[$this->normalizeKey($key)] = $value;
            }
            
            return $sorted;
        }
        
        public function normalizeKey($key)
        {
            return str_replace('_', '-', $key);
        }
    }