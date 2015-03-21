<?php

    namespace AeonTest\HttpCore\Uri;
    
    use Aeon\HttpCore\Uri\Query;
								    
    class QueryTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $query = new Query('name=Bob&foo=Bar');
        
            $this->assertSame($query->__toString(), '?name=Bob&foo=Bar');
        }
        
        public function testGet()
        {
            $query = new Query('name=Bob&foo=Bar');
        
            $this->assertSame($query->get(), 'name=Bob&foo=Bar');
        
            $query = new Query('?name=Bob&foo=Bar');
        
            $this->assertSame($query->get(), 'name=Bob&foo=Bar');
        }
        
        public function testSet()
        {
            $query = new Query('name=Bob&foo=Bar');
        
            $query->set('?name=Jim&bar=Baz');
        
            $this->assertSame($query->get(), 'name=Jim&bar=Baz');
        
            $this->setExpectedException('InvalidArgumentException');
        
            $query->set(1);
        }
    }