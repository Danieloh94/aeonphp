<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Protocol;
    
    class Message
    {
        public function __construct($body, $headers, $protocol)
        {
            $this->setBody($body);
            $this->setHeaders($headers);
            $this->setProtocol($protocol);
        }

        public function getBody()
        {
            return $this->body;
        }
        
        public function setBody(Body $body)
        {
            $this->body = $body;
        }
        
        public function getHeaders()
        {
            return $this->headers;
        }
        
        public function setHeaders(Headers $headers)
        {
            $this->headers = $headers;
        }
        
        public function getProtocol()
        {
            return $this->protocol;
        }
        
        public function setProtocol(Protocol $protocol)
        {
            $this->protocol = $protocol;
        }
    }