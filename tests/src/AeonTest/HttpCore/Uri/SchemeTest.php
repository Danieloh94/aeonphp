<?php

    namespace AeonTest\HttpCore\Uri;
    
    use Aeon\HttpCore\Uri\Scheme;
								    
    class SchemeTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $scheme = new Scheme('http');
            
            $this->assertSame($scheme->__toString(), 'http://');
        }
        
        public function testGet()
        {
            $scheme = new Scheme('http');
            
            $this->assertSame($scheme->get(), 'http');
        }
        
        public function testSet()
        {
            $scheme = new Scheme('http');
            
            $scheme->set('https');
            
            $this->assertSame($scheme->get(), 'https');
            
            $this->setExpectedException('InvalidArgumentException');
            
            $scheme->set(1);
        }
    }