<?php

    namespace Aeon\HttpCore\Message;
    
    use \Aeon\HttpCore\Message\Headers\Header;
    
    class Headers
    {
        protected $headers;
        
        public function __construct($headers = [])
        {
            $this->setAll($headers);
        }
        
        public function __toString()
        {      
            $headers = '';
            foreach ($this->headers as $header) {
                $headers .= $header->__toString();
            }
            
            return $headers;
        }
        
        public function get($headerKey)
        {
            return $this->headers[$headerKey];
        }
        
        public function set(Header $header)
        {
            $this->headers[$header->getKey()] = $header;
        }
        
        public function getAll()
        {
            return $this->headers;
        }
        
        public function setAll(array $headers)
        {
            $this->headers = [];
            foreach ($headers as $header) {
                if (!$header instanceOf Header) {
                    throw new \InvalidArgumentException(sprintf(
                        'headers array values must be of type \Aeon\HttpCore\Message\Headers\Header, "%s" recieved.',
                        is_object($header) ? get_class($header) : gettype($header)
                    ));
                }

                $this->set($header);
            }
            
            return $this;
        }
    }