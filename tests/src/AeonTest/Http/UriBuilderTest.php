<?php

    namespace AeonTest\Http;
    
    use Aeon\Http\UriBuilder;

    class UriBuilderTest extends \PHPUnit_Framework_TestCase
    {
        protected $uriBuilder;
        
        public function __construct()
        {
            $this->uriBuilder = new UriBuilder();
        }
        
        public function testFromString()
        {
            $this->assertSame(
                'http://bob:secret@localhost:80/foo/bar/?name=bob#href', 
                $this->uriBuilder->fromString('http://bob:secret@localhost:80/foo/bar/?name=bob#href')->__toString()
            );
        }
        
        public function testFromArgs()
        {
            $uri = $this->uriBuilder->fromArgs(
                'http',
                'bob',
                'secret',
                'localhost',
                80,
                '/foo/bar',
                'name=bob',
                'href'
            );
            
            $this->assertSame('http://bob:secret@localhost:80/foo/bar/?name=bob#href', $uri->__toString());
            
            $uri = $this->uriBuilder->fromArgs();
            
            $this->assertSame('localhost', $uri->__toString());
        }
        
        public function testFromParts()
        {
            $uri = $this->uriBuilder->fromParts(parse_url('http://bob:secret@localhost:80/foo/bar?name=bob#href'));
            
            $this->assertSame('http://bob:secret@localhost:80/foo/bar/?name=bob#href', $uri->__toString());
        }
        
        public function testGetPart()
        {
            $this->assertSame('localhost', $this->uriBuilder->getPart('host', parse_url('http://localhost')));
            $this->assertNull($this->uriBuilder->getPart('port', parse_url('http://localhost')));
        }
    }