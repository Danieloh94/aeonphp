<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\Contract\HttpCore\Response\StatusContract;
    use \Aeon\Contract\HttpCore\ResponseContract;
    use \Aeon\HttpCore\Message;
				    
    class Response extends Message implements ResponseContract
    {
        protected $status;
        
        public function __construct($status, $body, $headers, $protocol)
        {
            $this->setStatus($status);
            
            parent::__construct($body, $headers, $protocol);
        }
        
        public function __toString()
        {
            return (string) $this->getResponseLine()."\r\n".$this->headers."\r\n".$this->body;
        }
        
        public function getResponseLine()
        {
            return (string) $this->protocol.' '.$this->status;
        }
        
        public function getStatus()
        {
            return $this->status;
        }
        
        public function setStatus(StatusContract $status)
        {
            $this->status = $status;
        }
    }