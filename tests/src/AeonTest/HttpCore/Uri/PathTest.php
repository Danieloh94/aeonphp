<?php

    namespace AeonTest\HttpCore\Uri;
    
    use Aeon\HttpCore\Uri\Path;
								    
    class PathTest extends \PHPUnit_Framework_TestCase
    { 
        public function testToString()
        {
            $path = new path('foo/bar');
        
            $this->assertSame($path->__toString(), '/foo/bar/');
            
            $path = new Path('/');
            
            $this->assertSame($path->__toString(), '/');
        }
        
        public function testGet()
        {
            $path = new Path('/');
        
            $this->assertSame($path->get(), '/');
            
            $path = new Path('foo/bar');
            
            $this->assertSame($path->get(), 'foo/bar');
        }
        
        public function testSet()
        {
            $path = new path('/');
        
            $path->set('/hello/bob');
        
            $this->assertSame($path->get(), 'hello/bob');
        
            $this->setExpectedException('InvalidArgumentException');
        
            $path->set(1);
        }
    }