<?php

    namespace AeonTest\HttpCore\Message;
    
    use \Aeon\HttpCore\Message\Protocol;
					
	class ProtocolTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $protocol = new Protocol('http', 1.1);
            
            $this->assertSame('HTTP/1.1', $protocol->__toString());
        }
        
        public function testGetType()
        {
            $protocol = new Protocol('http', 1.1);
            
            $this->assertSame('HTTP', $protocol->getType());
        }
        
        public function testSetType()
        {
            $protocol = new Protocol('http', 1.1);
            
            $protocol->setType('otherprotocol');
            
            $this->assertSame('OTHERPROTOCOL', $protocol->getType());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $protocol->setType(1);
        }
        
        public function testGetVersion()
        {
            $protocol = new Protocol('http', 1.1);
            
            $this->assertSame(1.1, $protocol->getVersion());
        }
        
        public function testSetVersion()
        {
            $protocol = new Protocol('http', 1.1);
            
            $protocol->setVersion(2.0);
            
            $this->assertSame(2.0, $protocol->getVersion());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $protocol->setVersion(1);
        }
    }