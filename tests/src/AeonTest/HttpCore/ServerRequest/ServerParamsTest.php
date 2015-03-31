<?php

    namespace AeonTest\HttpCore\ServerRequest;
    
    use \Aeon\HttpCore\ServerRequest\ServerParams;
				
    class ServerParamsTest extends \PHPUnit_Framework_TestCase
    {
        public function testNormalize()
        {
            $serverParams = new ServerParams(['foo_bar' => 'baz']);
            
            $this->assertSame('baz', $serverParams->get('foo-bar'));
        }
        
        public function testNormalizeKey()
        {
            $serverParams = new ServerParams();
            
            $this->assertSame('foo-bar', $serverParams->normalizeKey('foo_bar'));
        }
    }