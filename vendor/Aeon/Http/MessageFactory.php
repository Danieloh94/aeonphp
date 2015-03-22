<?php

    namespace Aeon\Http;
    
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Protocol;
        
    class MessageFactory
    {
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