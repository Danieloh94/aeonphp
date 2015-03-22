<?php

    namespace Aeon\Http;
    
    use \Aeon\Http\RequestFactory;
    
    class ServerRequestFactory extends RequestFactory
    {
        public function fromArgs(
            $server,
            $method, 
            $uri, 
            $body, 
            $headers, 
            $protocol
        ) {
            
        }
    }