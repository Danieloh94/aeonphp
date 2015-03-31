<?php

    namespace Aeon\Contract\HttpCore;
    
    use \Aeon\Contract\HttpCore\Response\StatusContract;
    
    interface ResponseContract
    {
        public function getStatus();
        public function setStatus(StatusContract $status);
        
        public function getResponseLine();
        
        public function __toString();
    }