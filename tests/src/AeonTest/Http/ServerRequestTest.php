<?php

    namespace AeonTest\Http;
    
    use \Aeon\Http\ServerRequest;
    use \Aeon\Http\RequestFactory;
    use \Aeon\Http\UriFactory;
    use \Aeon\Http\ServerRequest\ServerParams;
    use \Aeon\Http\ServerRequest\Params;
												
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
                '\Aeon\Http\ServerRequest\ServerParams', 
                $this->request->getServerParams()
            );        
        }
        
        public function testSetServerParams()
        {
            $this->request->setServerParams(new ServerParams());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\ServerParams',
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
            $this->request->setFileParams(new Params());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\Params',
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
            $this->request->setPostParams(new Params());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\Params',
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
            $this->request->setQueryParams(new Params());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\Params',
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
            $this->request->setCookieParams(new Params());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\Params',
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
            $this->request->setAttributes(new Params());
            
            $this->assertInstanceOf(
                '\Aeon\Http\ServerRequest\Params',
                $this->request->getAttributes()
            );
        }
    }