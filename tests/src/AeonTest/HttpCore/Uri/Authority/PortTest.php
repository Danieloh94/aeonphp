<?php

    namespace AeonTest\HttpCore\Uri\Authority;
    
    use Aeon\HttpCore\Uri\Authority\Port;
				    
    class PortTest extends \PHPUnit_Framework_TestCase
    { 
        public function testToString()
        {
            $port = new Port(80);
            
            $this->assertSame($port->__toString(), ':80');
        }
        
        public function testGet()
        {
            $port = new Port(80);
            
            $this->assertSame($port->get(), 80);
        }
        
        public function testSet()
        {
            $port = new Port(80);
            
            $port->set(443);
            
            $this->assertSame($port->get(), 443);
            
            $this->setExpectedException('InvalidArgumentException');
            
            $port->set('');
        }
    }