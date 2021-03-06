<?php

    namespace AeonTest\HttpCore\Message;
    
    use \Aeon\HttpCore\Message\Headers\Header;
    use \Aeon\HttpCore\Message\Headers;
					
	class HeadersTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $headers = new Headers([
                new Header('foo-bar', 'baz'),
                new Header('bar-baz', 'foo')
            ]);
            
            $this->assertSame("foo-bar:baz\r\nbar-baz:foo\r\n", $headers->__toString());
        }
        
        public function testGet()
        {
            $headers = new Headers([
                new Header('foo_bar', 'baz')
            ]);
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\Headers\HeaderContract', $headers->get('foo-bar'));
            
            $this->assertInternalType('array', $headers->get());
        }
        
        public function testSet()
        {
            $headers = new Headers();
            $headers->set(new Header('foo_bar', 'baz'));
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\Headers\HeaderContract', $headers->get('foo-bar'));
        }
        
        public function testSetAll()
        {
            $headers = new Headers();
            
            $headers->setAll([
                new Header('foo_bar', 'baz'),
                new Header('bar-baz', 'foo')
            ]);
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\Headers\HeaderContract', $headers->get('foo-bar'));
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Message\Headers\HeaderContract', $headers->get('bar-baz'));
            
            $this->setExpectedException('InvalidArgumentException');
            
            $headers->setAll([1, '']);
        }
    }