<?php

    namespace AeonTest\HttpCore;

    use \Aeon\HttpCore\Request;
    use \Aeon\HttpCore\Message\Headers;
    use \Aeon\HttpCore\Message\Headers\Header;
    use \Aeon\HttpCore\Message\Body;
    use \Aeon\HttpCore\Message\Protocol;
    use \Aeon\HttpCore\Request\Method;
    use \Aeon\HttpCore\Uri;
    use \Aeon\HttpCore\Uri\Scheme;
    use \Aeon\HttpCore\Uri\Authority;
    use \Aeon\HttpCore\Uri\Authority\Host;
    use \Aeon\HttpCore\Uri\Authority\Port;
    use \Aeon\HttpCore\Uri\Authority\UserInfo;
    use \Aeon\HttpCore\Uri\Path;
    use \Aeon\HttpCore\Uri\Query;
    use \Aeon\HttpCore\Uri\Fragment;
				    
    class RequestTest extends \PHPUnit_Framework_TestCase
    {
        protected $request;
        
        public function __construct()
        {
            $this->request = new Request(
                new Method('get'),
                new Uri(
                    new Authority(
                        new Host('localhost'),
                        null,
                        null
                    ),
                    new Scheme('http'),
                    new Path('foo/bar'),
                    null,
                    null
                ),
                new Body(fopen('php://memory', 'wb+')),
                new Headers([
                    new Header('foo-bar', 'baz'),
                    new Header('bar-baz', 'foo')
                ]),
                new Protocol('http', 1.1)
            );
        }
        
        public function testConstructor()
        {
            $this->request = new Request(
                new Method('get'),
                new Uri(
                    new Authority(
                        new Host('localhost'),
                        null,
                        null
                    ),
                    new Scheme('http'),
                    new Path('foo/bar'),
                    null,
                    null
                ),
                new Body(fopen('php://memory', 'wb+')),
                new Headers([
                    new Header('foo-bar', 'baz'),
                    new Header('bar-baz', 'foo')
                ]),
                new Protocol('http', 1.1)
            );
        }
        
        public function testToString()
        {
            $this->request->getBody()->write('message goes here.');
            
            $this->assertSame(
                "GET http://localhost/foo/bar/ HTTP/1.1\r\nfoo-bar:baz\r\nbar-baz:foo\r\n\r\nmessage goes here.", 
                $this->request->__toString()
            );
        }
        
        public function testGetRequestLine()
        {
            $this->assertSame(
                'GET http://localhost/foo/bar/ HTTP/1.1',
                $this->request->getRequestLine()  
            );
        }
        
        public function testGetMethod()
        {  
            $this->assertInstanceOf(
                'Aeon\Contract\HttpCore\Request\MethodContract', 
                $this->request->getMethod()
            );
        }
        
        public function testSetMethod()
        {
            $this->request->setMethod(new Method('post'));
            
            $this->assertInstanceOf(
                'Aeon\Contract\HttpCore\Request\MethodContract', 
                $this->request->getMethod()
            );
        }
        
        public function testGetUri()
        {
            $this->assertInstanceOf(
                'Aeon\Contract\HttpCore\UriContract',
                $this->request->getUri()
            );
        }
        
        public function testSetUri()
        {
            $this->request->setUri(
                new Uri(
                    new Authority(
                        new Host('localhost'),
                        null,
                        null
                    )
                )
            );
            
            $this->assertInstanceOf(
                'Aeon\HttpCore\Uri',
                $this->request->getUri()
            );
        }
    }