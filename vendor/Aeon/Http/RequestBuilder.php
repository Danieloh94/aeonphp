<?php

    namespace Aeon\Http;
    
    use \Aeon\HttpCore\Request;
    use \Aeon\HttpCore\Request\Method;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Headers\Header;
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Protocol;
    use \Aeon\Http\UriBuilder;
    
    class RequestBuilder
    {
        protected $uriBuilder;
        
        public function __construct(UriBuilder $uriBuilder)
        {
            $this->uriBuilder = $uriBuilder;
        }
        
        public function fromArgs($method, $uri, $body = 'php://memory', $headers = [], $protocol = 'HTTP/1.1')
        {
            return new Request(
                $this->makeMethod($method),
                $this->makeUri($uri),
                $this->makeBody($body),
                $this->makeHeaders($headers),
                $this->makeProtocol($protocol)
            );
        }
        
        public function makeMethod($method)
        {
            if (is_string($method)) {
                $method = new Method($method);
            }
            
            return $method;
        }
        
        public function makeUri($uri)
        {
            if (is_string($uri)) {
                $uri = $this->uriBuilder->fromString($uri);
            } elseif (is_array($uri)) {
                $uri = $this->uriBuilder->fromParts($uri);
            }
            
            return $uri;
        }
        
        public function makeBody($body)
        {
            if (is_string($body)) {
                $body = new Body(fopen($body, 'wb+'));
            } elseif (is_resource($body)) {
                $body = new Body($body);
            }
            
            return $body;
        }
        
        public function makeHeaders($headers)
        {
            if (is_array($headers)) {
                $headers = new Headers($headers);
            }
            
            return $headers;
        }
        
        public function makeProtocol($protocol)
        {
            if(strstr($protocol, '/', 5) !== false) {
                $parts = explode('/', $protocol);
                $type = $parts[0];
                $version = $parts[1];
            } else {
                $type = 'HTTP';
                $version = $protocol;
            }
            
            return new Protocol($type, (float) $version);
        }
    }