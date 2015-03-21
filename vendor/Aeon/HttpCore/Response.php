<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\HttpCore\Response\Status;
    
    class Response extends Message
    {
        public function __construct($status, $body, $headers, $protocol)
        {
            $this->setStatus($status);
            
            parent::__construct($body, $headers, $protocol);
        }
        
        public function __toString()
        {
            return (string) $this->protocol.' '.$this->status."\r\n".$this->headers."\r\n".$this->body;
        }
        
        public function getStatus()
        {
            return $this->status;
        }
        
        public function setStatus(Status $status)
        {
            $this->status = $status;
        }
    }