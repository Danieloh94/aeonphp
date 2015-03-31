<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\Contract\HttpCore\Message\BodyContract;
    use \Aeon\Contract\HttpCore\Message\HeadersContract;
    use \Aeon\Contract\HttpCore\Message\ProtocolContract;
    use \Aeon\Contract\HttpCore\MessageContract;
				    
    class Message implements MessageContract
    {
        protected $body;
        protected $headers;
        protected $protocol;
        
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
        
        public function setBody(BodyContract $body)
        {
            $this->body = $body;
        }
        
        public function getHeaders()
        {
            return $this->headers;
        }
        
        public function setHeaders(HeadersContract $headers)
        {
            $this->headers = $headers;
        }
        
        public function getProtocol()
        {
            return $this->protocol;
        }
        
        public function setProtocol(ProtocolContract $protocol)
        {
            $this->protocol = $protocol;
        }
    }