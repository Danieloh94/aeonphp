<?php

    namespace AeonTest\Http;
    
    use \Aeon\Http\MessageFactory;
				
    class MessageFactoryTest extends \PHPUnit_Framework_TestCase
    {
        public function testMakeBody()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\HttpCore\Message\Body', $msgFactory->makeBody('php://memory'));
        }
        
        public function testMakeHeaders()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\HttpCore\Message\Headers', $msgFactory->makeHeaders([]));
        }
        
        public function testMakeProtocol()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\HttpCore\Message\Protocol', $msgFactory->makeProtocol(1.1));
        }
    }