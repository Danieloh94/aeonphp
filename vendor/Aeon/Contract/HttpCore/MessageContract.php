<?php

    namespace Aeon\Contract\HttpCore;
    
    use \Aeon\Contract\HttpCore\Message\BodyContract;
    use \Aeon\Contract\HttpCore\Message\HeadersContract;
    use \Aeon\Contract\HttpCore\Message\ProtocolContract;
    
    interface MessageContract
    {
        public function getBody();
        public function setBody(BodyContract $body);
        
        public function getHeaders();
        public function setHeaders(HeadersContract $headers);
        
        public function getProtocol();
        public function setProtocol(ProtocolContract $protocol);
    }