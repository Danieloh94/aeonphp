<?php

    namespace Aeon\Http;

    use \Aeon\HttpCore\Uri\Scheme;
    use \Aeon\HttpCore\Uri\Authority;
    use \Aeon\HttpCore\Uri\Authority\Host;
    use \Aeon\HttpCore\Uri\Authority\Port;
    use \Aeon\HttpCore\Uri\Authority\UserInfo;
    use \Aeon\HttpCore\Uri\Path;
    use \Aeon\HttpCore\Uri\Query;
    use \Aeon\HttpCore\Uri\Fragment;
    use \Aeon\HttpCore\Uri;
    
    class UriBuilder
    {
        public function fromString($uri)
        {
            if (!is_string($uri)) {
                throw new \InvalidArgumentException(sprintf(
                    'uri must be of type string, "%s" recieved.',
                    is_object($uri) ? get_class($uri) : gettype($uri)
                ));
            }

            return $this->fromParts(parse_url($uri));
        }
        
        public function fromArgs(
            $scheme = null, 
            $user = null, 
            $pass = null, 
            $host = 'localhost', 
            $port = null, 
            $path = null, 
            $query = null, 
            $fragment = null
        ){
            return new Uri(
                $this->makeAuthority($host, $user, $pass, $port),
                $this->makeScheme($scheme),
                $this->makePath($path),
                $this->makeQuery($query),
                $this->makeFragment($fragment)
            );
        }
        
        public function fromParts(array $parts)
        {
            return $this->fromArgs(
                $this->getPart('scheme', $parts),
                $this->getPart('user', $parts),
                $this->getPart('pass', $parts),
                $this->getPart('host', $parts),
                $this->getPart('port', $parts),
                $this->getPart('path', $parts),
                $this->getPart('query', $parts),
                $this->getPart('fragment', $parts)
            );
        }
        
        public function getPart($key, $parts)
        {
            if (array_key_exists($key, $parts)) {
                return $parts[$key];
            }
            
            return null;
        }
        
        public function makeScheme($scheme = null)
        {
            if ($scheme !== null) {
                return new Scheme($scheme);
            }
        }
        
        public function makeAuthority($host, $user = null, $pass = null, $port = null)
        {
            return new Authority(
                $this->makeHost($host),
                $this->makeUserInfo($user, $pass),
                $this->makePort($port)
            );
        }
        
        public function makeUserInfo($user = null, $pass = null)
        {
            if ($user !== null) {
                return new UserInfo($user, $pass);
            }
        }
        
        public function makePort($port = null)
        {
            if ($port !== null) {
                return new Port((int) $port);
            }
        }
        
        public function makeHost($host)
        {
            return new Host($host);
        }
        
        public function makePath($path = null)
        {
            if ($path !== null) {
                return new Path($path);
            }
        }
        
        public function makeQuery($query = null) 
        {
            if ($query !== null) {
                return new Query($query);
            }
        }
        
        public function makeFragment($fragment = null)
        {
            if ($fragment !== null) {
                return new Fragment($fragment);
            }
        }
    }