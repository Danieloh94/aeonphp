<?php

    namespace Aeon\Contract\HttpCore\Uri;
    
    use \Aeon\Contract\HttpCore\Uri\Authority\UserInfoContract;
    use \Aeon\Contract\HttpCore\Uri\Authority\HostContract;
    use \Aeon\Contract\HttpCore\Uri\Authority\PortContract;
    
    interface AuthorityContract
    {  
        public function __toString();
        
        public function getUserInfo();
        public function setUserInfo(UserInfoContract  $userInfo);
        
        public function getHost();
        public function setHost(HostContract $host);
        
        public function getPort();
        public function setPort(PortContract $port);
    }