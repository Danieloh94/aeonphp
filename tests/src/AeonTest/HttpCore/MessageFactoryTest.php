<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\MessageFactory;
				
    class MessageFactoryTest extends \PHPUnit_Framework_TestCase
    {
        public function testMakeBody()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\BodyContract', $msgFactory->makeBody('php://memory'));
        }
        
        public function testMakeHeaders()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\HeadersContract', $msgFactory->makeHeaders(['foo-bar' => 'baz']));
        }
        
        public function testMakeHeader()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\Headers\HeaderContract', $msgFactory->makeHeader('foo-bar', 'baz'));
        }
        
        public function testMakeProtocol()
        {
            $msgFactory = new MessageFactory();
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\ProtocolContract', $msgFactory->makeProtocol(1.1));
        }
    }