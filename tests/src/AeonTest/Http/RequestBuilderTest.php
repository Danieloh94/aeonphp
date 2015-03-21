<?php

    namespace AeonTest\Http;
    
    use \Aeon\Http\RequestBuilder;
    use \Aeon\Http\UriBuilder;
				
    class RequestBuilderTest extends \PHPUnit_Framework_TestCase
    {
        public function testFromArgs()
        {
            $request = (new RequestBuilder( new UriBuilder))->fromArgs('get', 'http://localhost', 'php://memory', [], '1.1');
            $this->assertInstanceOf('Aeon\HttpCore\Request', $request);
            $request = (new RequestBuilder( new UriBuilder))->fromArgs(
                'get', 
                parse_url('http://localhost'), 
                fopen('php://memory', 'wb+'), 
                [], 
                'HTTP/1.1'
            );
        }
    }