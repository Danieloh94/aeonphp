<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\Request\Method;
				    
    class MethodTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $method = new Method('get');

            $this->assertSame('GET', $method->__toString());
        }
        
        public function testGet()
        {
            $method = new Method('get');
            
            $this->assertSame('GET', $method->get());
        }
        
        public function testSet()
        {
            $method = new Method('get');
            
            $method->set('post');
            
            $this->assertSame('POST', $method->get());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $method->set('HELLO');
            $method->set(1);
        }
    }