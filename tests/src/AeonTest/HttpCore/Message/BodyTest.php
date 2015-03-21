<?php

    namespace AeonTest\HttpCore\Message;
    
    use \Aeon\HttpCore\Message\Body;
    
    class BodyTest extends \PHPUnit_Framework_TestCase
    {     
        public function testToString()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello Bob!');
            
            $this->assertEquals($body->__toString(), 'Hello Bob!');
            
            $body->close();
        }
        
        public function testClose()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->close();
            
            $this->assertNull($body->getResource(), null);
        }
        
        public function testGetResource()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $this->assertInternalType('resource', $body->getResource());
            
            $body->close();
        }
        
        public function testSetResource()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->close();
            
            $body->setResource(fopen('php://temp', 'wb+'));
            
            $this->assertInternalType('resource', $body->getResource());
            
            $this->setExpectedException('LogicException');
            
            $body->setResource(1, 1);
            
        }
        
        public function testGetSize()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello Bob');
            
            $this->assertSame($body->getSize(), 9);
            
            $body->close();
        }
        
        public function testTell()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello Bob');
            
            $this->assertSame($body->tell(), 9);
            
            $body->write(', Hello Again!');
            
            $this->assertSame($body->tell(), 23);
            
            $body->close();
        }
        
        public function testEof()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello Bob');
            
            $this->assertFalse($body->eof());
            
            $body->read(9);
            
            $this->assertTrue($body->eof());
            
            $body->close();
        }
        
        public function testIsSeekable()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $this->assertTrue($body->isSeekable());
        }
        
        public function testSeek()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello Bob');
            
            $this->assertSame($body->seek(9), 0);
            
            $body->close();
            
            $body = new Body(fopen('php://stdout', 'wb+'));

            $this->setExpectedException('LogicException');
            
            $body->seek(1, 0);
            
            $body->close();
        }
        
        public function testRewind()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello');
            $body->rewind();
            
            $this->assertSame($body->read(5), 'Hello');
            
            $body->close();
        }
        
        public function testIsWriteable()
        {
            $body = new Body(fopen('php://input', 'r'));
            
            $this->assertFalse($body->isWriteable());
            
            $body->close();
            
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $this->assertTrue($body->isWriteable());
            
            $body->close();
        }
        
        public function testWrite()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello');
            
            $this->assertSame($body->__toString(), 'Hello');
            
            $body->close();
            
            $body = new Body(fopen('php://stdin', 'wb+'));
            
            $this->setExpectedException('LogicException');
            
            $body->write('hello');
            
            $body->close();
        }
        
        public function testIsReadable()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $this->assertTrue($body->isReadable());
            
            $body->close();
        }
        
        public function testRead()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello');
            $body->rewind();
            
            $this->assertSame($body->read(5), 'Hello');
            
            $body->close();
            
            $body = new Body(fopen('php://stdout', 'wb+'));
            
            $this->setExpectedException('LogicException');
            
            $body->read(1);
            
            $body->close();
        }
        
        public function testGetContents()
        {
            $body = new Body(fopen('php://memory', 'wb+'));
            
            $body->write('Hello');
            $body->rewind();
            
            $this->assertSame($body->getContents(), 'Hello');
            
            $body->close();
        }
        
        public function testGetMetadata()
        {
            $body = new Body(fopen('php://input', 'wb+'));
            
            $this->assertSame($body->getMetadata('mode'), 'rb');
            
            $meta = $body->getMetadata();
            $this->assertSame($meta['mode'], 'rb');
            
            $this->assertFalse($body->getMetadata('foo'));
            
            $body->close();
        }
    }