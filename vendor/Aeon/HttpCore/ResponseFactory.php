<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\HttpCore\MessageFactory;
    use \Aeon\HttpCore\Response;
    use \Aeon\HttpCore\Response\Status;
								    
    class ResponseFactory extends MessageFactory
    {
        public function fromArgs($statusCode = 200, $body = 'php://memory', $headers = [], $protocol = 'HTTP/1.1')
        {
            return new Response(
                $this->makeStatus($status), 
                $this->makeBody($body),
                $this->makeHeaders($headers),
                $this->makeProtocol($protocol)
            );
        }
        
        public function makeStatus($status)
        {
            if (is_string($status) || is_int($status)) {
                $status = new Status((int) $status);
            }
            
            return $status;
        }
    }