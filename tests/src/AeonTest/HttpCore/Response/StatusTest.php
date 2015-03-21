<?php

    namespace AeonTest\HttpCore\Response;
    
    use \Aeon\HttpCore\Response\Status;
				    
    class StatusTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $status = new Status(200);
            
            $this->assertSame('200 OK', $status->__toString());
        }
        
        public function testSet()
        {
            $status = new Status(200);
            
            $status->set(201);
            
            $this->assertSame(201, $status->getCode());
            $this->assertSame('Created', $status->getReasonPhrase());
        }
        
        public function testGetCode()
        {
            $status = new Status(200);
            
            $this->assertSame(200, $status->getCode());
        }
        
        public function testSetCode()
        {
            $status = new Status(200);
            
            $status->setCode(201);
            
            $this->assertSame(201, $status->getCode());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $status->setCode('');
        }
        
        public function testGetReasonPhrase()
        {
            $status = new Status(200);
            
            $this->assertSame('OK', $status->getReasonPhrase());
        }
        
        public function testSetReasonPhrase()
        {
            $status = new Status(200);
            
            $status->setReasonPhrase('Created');
            
            $this->assertSame('Created', $status->getReasonPhrase());
            
            $this->setExpectedException('InvalidArgumentException');
            
            $status->setReasonPhrase(1);
        }
    }