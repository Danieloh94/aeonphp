<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\HttpCore\Message;
    use \Aeon\HttpCore\Request\Method;
    use \Aeon\HttpCore\Uri;
    
    class Request extends Message
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
        
        public function getMethod()
        {
            return $this->method;
        }
        
        public function setMethod(Method $method)
        {
            $this->method = $method;
        }
        
        public function getUri()
        {
            return $this->uri;
        }
        
        public function setUri(Uri $uri)
        {
            $this->uri = $uri;
        }
    }