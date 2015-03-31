<?php

    namespace AeonTest\StdLib;
    
    use Aeon\StdLib\Collection;
	
	class CollectionTest extends \PHPUnit_Framework_TestCase
    {
        public function testGet()
        {
            $collection = new Collection(['foo' => 'bar']);
            
            $this->assertSame('bar', $collection->get('foo'));
            
            $this->assertInternalType('array', $collection->get());
        }
        
        public function testSet()
        {
            $collection = new Collection();
            
            $collection->set('foo', 'bar');
            
            $collection->set([
                'bar' => 'foo'
            ]);
            
            $this->assertSame('bar', $collection->get('foo'));
            $this->assertSame('foo', $collection->get('bar'));
        }
        
        public function testHasKey()
        {
            $collection = new Collection(['foo' => 'bar']);
            
            $this->assertTrue($collection->hasKey('foo'));
        }
        
        public function testHasValue()
        {
            $collection = new Collection(['foo' => 'bar']);
            
            $this->assertTrue($collection->hasValue('bar'));
        }
        
        public function testRemove()
        {
            $collection = new Collection(['foo' => 'bar']);
            
            $collection->remove('foo');
            
            $this->assertFalse($collection->hasKey('foo'));
            
            $collection->set('foo', 'bar');
            
            $val = $collection->remove('foo', true);
            
            $this->assertEquals('bar', $val);
        }
    }