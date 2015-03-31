<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\ServerRequest;
    use \Aeon\HttpCore\RequestFactory;
    use \Aeon\HttpCore\UriFactory;
    use \Aeon\HttpCore\ServerRequest\ServerParams;
    use \Aeon\StdLib\Collection;
												
    class ServerRequestTest extends \PHPUnit_Framework_TestCase
    {
        protected $request;
        
        public function __construct()
        {
            $requestFactory = new RequestFactory(new UriFactory());
            
            $this->request = new ServerRequest(
                new ServerParams([]),
                $requestFactory->makeMethod('get'),
                $requestFactory->makeUri('http://localhost'),
                $requestFactory->makeBody('php://memory'),
                $requestFactory->makeHeaders([]),
                $requestFactory->makeProtocol(1.1)    
            );
        }
        
        public function testConstruct()
        {
            $requestFactory = new RequestFactory(new UriFactory());
            
            $this->request = new ServerRequest(
                new ServerParams([]),
                $requestFactory->makeMethod('get'),
                $requestFactory->makeUri('http://localhost'),
                $requestFactory->makeBody('php://memory'),
                $requestFactory->makeHeaders([]),
                $requestFactory->makeProtocol(1.1)
            );
        }
        
        public function testGetServerParams()
        {
            $this->assertInstanceOf(
                '\Aeon\Contract\HttpCore\ServerRequest\ServerParamsContract', 
                $this->request->getServerParams()
            );        
        }
        
        public function testSetServerParams()
        {
            $this->request->setServerParams(new ServerParams());
            
            $this->assertInstanceOf(
                '\Aeon\Contract\HttpCore\ServerRequest\ServerParamsContract',
                $this->request->getServerParams()
            );
        }
        
        public function testGetFileParams()
        {
            $this->assertNull(
                $this->request->getFileParams()
            );
        }
        
        public function testSetFileParams()
        {    
            $this->request->setFileParams(new Collection());
            
            $this->assertInstanceOf(
                '\Aeon\StdLib\Collection',
                $this->request->getFileParams()
            );
        }
        
        public function testGetPostParams()
        {
            $this->assertNull(
                $this->request->getPostParams()
            );
        }
        
        public function testSetPostParams()
        {
            $this->request->setPostParams(new Collection());
            
            $this->assertInstanceOf(
                '\Aeon\StdLib\Collection',
                $this->request->getPostParams()
            );
        }
        
        public function testGetQueryParams()
        {
            $this->assertNull(
                $this->request->getQueryParams()
            );
        }
        
        public function testSetQueryParams()
        {
            $this->request->setQueryParams(new Collection());
            
            $this->assertInstanceOf(
                '\Aeon\StdLib\Collection',
                $this->request->getQueryParams()
            );
        }
        
        public function testGetCookieParams()
        {
            $this->assertNull(
                $this->request->getCookieParams()
            );
        }
        
        public function testSetCookieParams()
        {
            $this->request->setCookieParams(new Collection());
            
            $this->assertInstanceOf(
                '\Aeon\StdLib\Collection',
                $this->request->getCookieParams()
            );
        }
        
        public function testGetAttributes()
        {
            $this->assertNull(
                $this->request->getAttributes()
            );
        }
        
        public function testSetAttributes()
        {
            $this->request->setAttributes(new Collection());
            
            $this->assertInstanceOf(
                '\Aeon\StdLib\Collection',
                $this->request->getAttributes()
            );
        }
    }