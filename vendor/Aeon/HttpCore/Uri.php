<?php

    namespace Aeon\HttpCore;
    
    use \Aeon\HttpCore\Uri\Scheme;
    use \Aeon\HttpCore\Uri\Authority;
    use \Aeon\HttpCore\Uri\Path;
    use \Aeon\HttpCore\Uri\Query;
    use \Aeon\HttpCore\Uri\Fragment;
    
    class Uri
    {
        protected $scheme;
        protected $authority;
        protected $path;
        protected $query;
        protected $fragment;
        
        public function __construct(
            $authority, 
            $scheme = null, 
            $path = null, 
            $query = null, 
            $fragment = null
        ){
            $this->setAuthority($authority)
                ->setScheme($scheme)
                ->setPath($path)
                ->setQuery($query)
                ->setFragment($fragment);
        }
        
        public function __toString()
        {
            return (string) $this->scheme.$this->authority.$this->path.$this->query.$this->fragment;
        }
        
        public function getScheme()
        {
            return $this->scheme;
        }
        
        public function setScheme($scheme)
        {
            if ($scheme instanceOf Scheme) {
                $this->scheme = $scheme;
            }
            
            return $this;
        }
        
        public function getAuthority()
        {
            return $this->authority;
        }
        
        public function setAuthority(Authority $authority)
        {
            $this->authority = $authority;
            
            return $this;
        }
        
        public function getPath()
        {
            return $this->path;
        }
        
        public function setPath($path)
        {
            if ($path instanceOf Path) {
                $this->path = $path;
            }
            
            return $this;
        }
        
        public function getQuery()
        {
            return $this->query;
        }
        
        public function setQuery($query)
        {
            if ($query instanceOf Query) {
                $this->query = $query;   
            }
            
            return $this;
        }
        
        public function getFragment()
        {
            return $this->fragment;
        }
        
        public function setFragment($fragment)
        {
            if ($fragment instanceOf Fragment) {
                $this->fragment = $fragment;
            }
            
            return $this;
        }
    }