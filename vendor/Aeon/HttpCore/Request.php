<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\Contract\HttpCore\MessageContract;
    use \Aeon\Contract\HttpCore\Request\MethodContract;
    use \Aeon\Contract\HttpCore\UriContract;
    use Aeon\Contract\HttpCore\RequestContract;
				    
    class Request extends Message implements RequestContract
    {
        protected $method;
        protected $uri;
        
        public function __construct($method, $uri, $body, $headers, $protocol)
        {
            $this->setMethod($method);
            $this->setUri($uri);
            
            parent::__construct($body, $headers, $protocol);
        }
        
        public function __toString()
        {
            return (string) $this->method.' '.$this->uri.' '.$this->protocol."\r\n".$this->headers."\r\n".$this->body;
        }
        
        public function getRequestLine()
        {
            return (string) $this->method.' '.$this->uri.' '.$this->protocol;
        }
        
        public function getMethod()
        {
            return $this->method;
        }
        
        public function setMethod(MethodContract $method)
        {
            $this->method = $method;
        }
        
        public function getUri()
        {
            return $this->uri;
        }
        
        public function setUri(UriContract $uri)
        {
            $this->uri = $uri;
        }
    }