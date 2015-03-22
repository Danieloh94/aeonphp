<?php

    namespace AeonTest\Http\ServerRequest;
    
    use \Aeon\Http\ServerRequest\Params;
				
    class ParamsTest extends \PHPUnit_Framework_TestCase
    {
        public function testGet()
        {
            $params = new Params(['name' => 'bob']);
            
            $this->assertSame('bob', $params->get('name'));
        }
        
        public function testGetAll()
        {
            $params = new Params(['name' => 'bob']);
            
            $this->assertInternalType('array', $params->getAll());
        }
        
        public function testSet()
        {
            $params = new Params();
            
            $params->set('name', 'bob');
            
            $this->assertSame('bob', $params->get('name'));
        }
        
        public function testSetAll()
        {
            $params = new Params();
            
            $params->setAll(['name' => 'bob']);
            
            $this->assertSame('bob', $params->get('name'));
        }
        
        public function testHas()
        {
            $params = new Params(['name' => 'bob']);
            
            $this->assertTrue($params->has('name'));
            $this->assertFalse($params->has('foo'));
        }
    }