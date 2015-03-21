<?php

    namespace AeonTest\HttpCore\Message\Headers;
    
    use \Aeon\HttpCore\Message\Headers\Header;
				
	class HeaderTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $header = new Header('foo_bar', 'baz');
            
            $this->assertSame("foo-bar: baz\r\n", $header->__toString());
            
        }
        
        public function testGetKey()
        {
            $header = new Header('foo_bar', 'baz');
            
            $this->assertSame('foo-bar', $header->getKey());
        }
        
        public function testSetKey()
        {
            $header = new Header('foo_bar', 'baz');
            
            $header->setKey('foo_baz');
            
            $this->assertSame('foo-baz', $header->getKey());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $header->setKey(1);
        }
        
        public function testGetValue()
        {
            $header = new Header('foo_bar', 'baz');
            
            $this->assertSame('baz', $header->getValue());
        }
        
        public function testSetValue()
        {
            $header = new Header('foo_bar', 'baz');
            
            $header->setValue('bob');
            
            $this->assertSame('bob', $header->getValue());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $header->setValue(1);
        }
    }