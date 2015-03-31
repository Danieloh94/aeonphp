<?php

    namespace AeonTest\HttpCore;
    
    use Aeon\HttpCore\UriFactory;

    class UriFactoryTest extends \PHPUnit_Framework_TestCase
    {
        protected $uriFactory;
        
        public function __construct()
        {
            $this->uriFactory = new UriFactory();
        }
        
        public function testFromString()
        {
            $this->assertSame(
                'http://bob:secret@localhost:80/foo/bar/?name=bob#href', 
                $this->uriFactory->fromString('http://bob:secret@localhost:80/foo/bar/?name=bob#href')->__toString()
            );
            
            $this->setExpectedException('InvalidArgumentException');
            
            $this->uriFactory->fromString(1);
        }
        
        public function testFromArgs()
        {
            $uri = $this->uriFactory->fromArgs(
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
            
            $uri = $this->uriFactory->fromArgs();
            
            $this->assertSame('localhost', $uri->__toString());
        }
        
        public function testFromParts()
        {
            $uri = $this->uriFactory->fromParts(parse_url('http://bob:secret@localhost:80/foo/bar?name=bob#href'));
            
            $this->assertSame('http://bob:secret@localhost:80/foo/bar/?name=bob#href', $uri->__toString());
        }
        
        public function testGetPart()
        {
            $this->assertSame('localhost', $this->uriFactory->getPart('host', parse_url('http://localhost')));
            $this->assertNull($this->uriFactory->getPart('port', parse_url('http://localhost')));
        }
        
        public function testParseUri()
        {
            $this->assertInternalType('array', $this->uriFactory->parseUri('http://localhost'));
            
            $this->setExpectedException('LogicException');
            
            $this->uriFactory->parseUri('http://:80');
        }
    }