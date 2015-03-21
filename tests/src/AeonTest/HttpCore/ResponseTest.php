<?php

    namespace AeonTest\HttpCore;

    use \Aeon\HttpCore\Response;
    use \Aeon\HttpCore\Response\Status;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Headers\Header;
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Protocol;

    class ResponseTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $response = new Response(
                new Status(200),
                new Body(fopen('php://memory', 'wb+')),
                new Headers([
                    new Header('foo-bar', 'baz'),
                    new Header('bar-baz', 'foo')
                ]),
                new Protocol('http', 1.1)
            );
            
            $response->getBody()->write('Hello');
            
            $this->assertSame(
                "HTTP/1.1 200 OK\r\nfoo-bar: baz\r\nbar-baz: foo\r\n\r\nHello",
                $response->__toString()  
            );
        }
        
        public function testGetStatus()
        {
            $response = new Response(
                new Status(200),
                new Body(fopen('php://memory', 'wb+')),
                new Headers([
                    new Header('foo-bar', 'baz'),
                    new Header('bar-baz', 'foo')
                ]),
                new Protocol('http', 1.1)
            );
            
            $this->assertInstanceOf('Aeon\HttpCore\Response\Status', $response->getStatus());
        }
        
        public function testSetStatus()
        {
            $response = new Response(
                new Status(200),
                new Body(fopen('php://memory', 'wb+')),
                new Headers([
                    new Header('foo-bar', 'baz'),
                    new Header('bar-baz', 'foo')
                ]),
                new Protocol('http', 1.1)
            );
            
            $response->setStatus(new Status(201));
            
            $this->assertInstanceOf('Aeon\HttpCore\Response\Status', $response->getStatus());
        }
    }