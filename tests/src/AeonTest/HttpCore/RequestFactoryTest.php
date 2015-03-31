<?php

    namespace AeonTest\Http;
    
    use \Aeon\HttpCore\RequestFactory;
    use \Aeon\HttpCore\UriFactory;
				
    class RequestFactoryTest extends \PHPUnit_Framework_TestCase
    {
        public function testFromArgs()
        {
            $request = (new RequestFactory( new UriFactory))->fromArgs('get', 'http://localhost', 'php://memory', [], '1.1');
            $this->assertInstanceOf('Aeon\Contract\HttpCore\RequestContract', $request);
            $request = (new RequestFactory(new UriFactory))->fromArgs(
                'get', 
                parse_url('http://localhost'), 
                fopen('php://memory', 'wb+'), 
                [], 
                'HTTP/1.1'
            );
        }
    }