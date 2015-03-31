<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\ServerRequestFactory;
    use \Aeon\HttpCore\UriFactory;
								    
    class ServerRequestFactoryTest extends \PHPUnit_Framework_TestCase
    {
        protected $reqFactory;
        
        public function __construct()
        {
            $_SERVER['REQUEST_METHOD'] = 'get';
            $_SERVER['SERVER_NAME'] = 'localhost';
            $_SERVER['SERVER_PORT'] = '80';
            $_SERVER['REQUEST_URI'] = '/';
            $_SERVER['QUERY_STRING'] = '';
            $_SERVER['SERVER_PROTOCOL'] = 'http';
            $_SERVER['HTTP_ACCEPT'] = 'hello';
            
            $this->reqFactory = new ServerRequestFactory(new UriFactory());
        }
        
        public function testFromArgs() 
        {         
            $this->assertInstanceOf('Aeon\HttpCore\ServerRequest', $this->reqFactory->fromArgs($_SERVER));
        }
        
        public function testFromGlobals()
        {   
            $this->assertInstanceOf('Aeon\HttpCore\ServerRequest', $this->reqFactory->fromGlobals());
        }
        
        public function testGetUri()
        {
            $_SERVER['HTTPS'] = 'on';
            $this->assertInstanceOf('Aeon\HttpCore\Uri', $this->reqFactory->getUri());
        }
        
        public function testGetHeaders()
        {   
            $this->assertInternalType('array', $this->reqFactory->getHeaders());
            
            include_once 'tests/include/functions.php';
            
            $this->assertInternalType('array', $this->reqFactory->getHeaders());
        }
        
        public function testGetHeadersFromEnv()
        {
            $this->assertInternalType('array', $this->reqFactory->getHeadersFromEnv());
        }
        
        public function testIsDefaultPort()
        {
             $this->assertSame(null, $this->reqFactory->isDefaultPort(80));
             
             $this->assertSame(123, $this->reqFactory->isDefaultPort(123));
        }
        
        public function testMakeServerParams()
        {
            $this->assertInstanceOf(
                'Aeon\Contract\HttpCore\ServerRequest\ServerParamsContract', 
                $this->reqFactory->makeServerParams([])
            );
        }
        
        public function testMakeParams()
        {
            $this->assertInstanceOf(
                'Aeon\StdLib\Collection',
                $this->reqFactory->makeParams([])
            );
        }
    }