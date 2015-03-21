<?php

    namespace AeonTest\HttpCore\Uri\Authority;
    
    use \Aeon\HttpCore\Uri\Authority\Host;
    
    class HostTest extends \PHPUnit_Framework_TestCase
    {  
          
        public function testToString()
        {
            $host = new Host('localhost');
            
            $this->assertSame($host->__toString(), 'localhost');
        }
        
        public function testGetHost()
        {
            $host = new Host('localhost');
            
            $this->assertSame($host->get(), 'localhost');
        }
        
        public function testSetHost()
        {
            $host = new Host('localhost');
            
            $host->set('foo');
            
            $this->assertSame($host->get(), 'foo');
            
            $this->setExpectedException('InvalidArgumentException');
            
            $host->set(1);
        }
    }