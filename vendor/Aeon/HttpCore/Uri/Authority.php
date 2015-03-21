<?php

    namespace Aeon\HttpCore\Uri;
    
    use \Aeon\HttpCore\Uri\Authority\UserInfo;
    use \Aeon\HttpCore\Uri\Authority\Host;
    use \Aeon\HttpCore\Uri\Authority\Port;
    
    class Authority
    {
        protected $host;
        protected $userInfo;
        protected $port;
        
        public function __construct($host, $userInfo = null, $port = null)
        {
            if ($userInfo !== null) {
                $this->setUserInfo($userInfo);
            }
            
            if ($port !== null) {
                $this->setPort($port);
            }
            
            $this->setHost($host);
        }
        
        public function __toString()
        {
            return $this->userInfo.$this->host.$this->port;
        }
        
        public function getUserInfo()
        {
            return $this->userInfo;
        }
        
        public function setUserInfo(UserInfo  $userInfo = null)
        {
            $this->userInfo = $userInfo;
        }
        
        public function getHost()
        {
            return $this->host;
        }
        
        public function setHost(Host $host = null)
        {       
            $this->host = $host;
        }
        
        public function getPort()
        {
            return $this->port;
        }
        
        public function setPort(Port $port = null)
        {
            $this->port = $port;
        }
    }