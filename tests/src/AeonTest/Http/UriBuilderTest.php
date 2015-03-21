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
            
            $this->setExpectedException('InvalidArgumentException');
            
            $this->uriBuilder->fromString(1);
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
        
        public function testParseUri()
        {
            $this->assertInternalType('array', $this->uriBuilder->parseUri('http://localhost'));
            
            $this->setExpectedException('LogicException');
            
            $this->uriBuilder->parseUri('http://:80');
        }
    }