<?php

    namespace Aeon\HttpCore\ServerRequest;
    
    use \Aeon\StdLib\Collection;
    use \Aeon\Contract\HttpCore\ServerRequest\ServerParamsContract;
				    
    class ServerParams extends Collection implements ServerParamsContract
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