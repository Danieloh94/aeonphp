<?php

    namespace Aeon\HttpCore\Response;
    
    class Status
    {
        protected $code;
        
        protected $reasonPhrase;
        
        protected $statusMap = [
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-status',
            208 => 'Already Reported',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => 'Switch Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'code Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            416 => 'Requested range not satisfiable',
            417 => 'Expectation Failed',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            428 => 'Precondition Required',
            429 => 'Too Many Requests',
            431 => 'Request Header Fields Too Large',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            508 => 'Loop Detected',
            511 => 'Network Authentication Required'
        ];
        
        public function __construct($code, $reasonPhrase = null)
        {
            $this->set($code, $reasonPhrase);
        }
        
        public function __toString()
        {
            return $this->code.' '.$this->reasonPhrase;
        }
        
        public function set($code, $reasonPhrase = null)
        {
            $this->setCode($code);
            
            if ($reasonPhrase === null) {
                $reasonPhrase = $this->statusMap[$code]; 
            }
            
            $this->setReasonPhrase($reasonPhrase);
        }
        
        public function getCode()
        {
            return $this->code;
        }
        
        public function setCode($code)
        {
            if (!is_int($code) || !array_key_exists($code, $this->statusMap)) {
                throw new \InvalidArgumentException(sprintf(
                    'code must be of type integer and a valid http code, "%s" recieved.',
                    is_object($code) ? get_class($code) : gettype($code)
                ));
            }
            
            $this->code = $code;
        }
        
        public function setReasonPhrase($reasonPhrase)
        {
            if (!is_string($reasonPhrase) || $reasonPhrase === '') {
                throw new \InvalidArgumentException(sprintf(
                    'reason phrase must be of type string and not empty, "%s" recieved.',
                    is_object($reasonPhrase) ? get_class($reasonPhrase) : gettype($reasonPhrase)
                ));
            }
            
            $this->reasonPhrase = $reasonPhrase;
        }
        
        public function getReasonPhrase()
        {
            return $this->reasonPhrase;
        }
    }