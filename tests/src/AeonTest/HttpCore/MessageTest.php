<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\Message;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Protocol;
				    
    class MessageTest extends \PHPUnit_Framework_TestCase
    {
        public function testGetBody()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)    
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\BodyContract', $message->getBody());
        }
        
        public function testSetBody()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)
            );
            
            $message->setBody(new Body(fopen('php://memory', 'wb+')));
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\BodyContract', $message->getBody());
        }
        
        public function testGetHeaders()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\HeadersContract', $message->getHeaders());
        }
        
        public function testSetHeaders()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)
            );
            
            $message->setHeaders(new Headers());
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\HeadersContract', $message->getHeaders());
        }
        
        public function testGetProtocol()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\ProtocolContract', $message->getProtocol());
        }
        
        public function testSetProtocol()
        {
            $message = new Message(
                new Body(fopen('php://memory', 'wb+')),
                new Headers(),
                new Protocol('http', 1.1)
            );
            
            $message->setProtocol(new Protocol('http', 1.1));
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\ProtocolContract', $message->getProtocol());
        }
    }