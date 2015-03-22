<?php

    namespace Aeon\Http;
    
    use \Aeon\HttpCore\Request;
    use \Aeon\Http\ServerRequest\Params;
    use \Aeon\Http\ServerRequest\ServerParams;
    
    class ServerRequest extends Request
    {
        protected $serverParams;    
        protected $fileParams;
        protected $postParams;       
        protected $queryParams;      
        protected $cookieParams;  
        protected $attributes;

        public function __construct(
            $server,
            $method, 
            $uri,
            $body, 
            $headers,
            $protocol
        ) {
            $this->setServerParams($server);
            parent::__construct($method, $uri, $body, $headers, $protocol);
        }
        
        public function getServerParams()
        {
            return $this->serverParams;
        }
        
        public function setServerParams(ServerParams $serverParams)
        {
            $this->serverParams = $serverParams;
        }
        
        public function getFileParams()
        {
            return $this->fileParams;
        }
        
        public function setFileParams(Params $fileParams)
        {
            $this->fileParams = $fileParams;
        }
        
        public function getPostParams()
        {
            return $this->postParams;
        }
        
        public function setPostParams(Params $postParams)
        {
            $this->postParams = $postParams;
        }
        
        public function getQueryParams()
        {
            return $this->queryParams;
        }
        
        public function setQueryParams(Params $queryParams)
        {
            $this->queryParams = $queryParams;
        }
        
        public function getCookieParams()
        {
            return $this->cookieParams;
        }
        
        public function setCookieParams(Params $cookieParams)
        {
            $this->cookieParams = $cookieParams;
        }
        
        public function getAttributes()
        {
            return $this->attributes;
        }
        
        public function setAttributes(Params $attributes)
        {
            $this->attributes = $attributes;
        }
    }