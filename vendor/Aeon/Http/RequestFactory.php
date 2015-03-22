<?php

    namespace Aeon\Http;
    
    use \Aeon\HttpCore\Request;
    use \Aeon\HttpCore\Request\Method;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Headers\Header;
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Protocol;
    use \Aeon\Http\UriFactory;
    
    class RequestFactory extends MessageFactory
    {
        protected $uriFactory;
        
        public function __construct(UriFactory $uriFactory)
        {
            $this->uriFactory = $uriFactory;
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
                $uri = $this->uriFactory->fromString($uri);
            } elseif (is_array($uri)) {
                $uri = $this->uriFactory->fromParts($uri);
            }
            
            return $uri;
        }
    }