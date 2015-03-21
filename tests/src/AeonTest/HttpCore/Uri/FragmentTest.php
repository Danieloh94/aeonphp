<?php

    namespace AeonTest\HttpCore\Uri;
    
    use Aeon\HttpCore\Uri\Fragment;
								    
    class FragmentTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $fragment = new Fragment('href');
        
            $this->assertSame($fragment->__toString(), '#href');
        }
        
        public function testGet()
        {
            $fragment = new Fragment('href');
        
            $this->assertSame($fragment->get(), 'href');
        
            $fragment = new Fragment('#href');
        
            $this->assertSame($fragment->get(), 'href');
        }
        
        public function testSet()
        {
            $fragment = new Fragment('href');
        
            $fragment->set('#href');
        
            $this->assertSame($fragment->get(), 'href');
        
            $this->setExpectedException('InvalidArgumentException');
        
            $fragment->set(1);
        }
    }