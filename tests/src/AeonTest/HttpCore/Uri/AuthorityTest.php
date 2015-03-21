<?php

    namespace AeonTest\HttpCore\Uri;
    
    use Aeon\HttpCore\Uri\Authority;
    use Aeon\HttpCore\Uri\Authority\Host;
    use Aeon\HttpCore\Uri\Authority\Port;
    use Aeon\HttpCore\Uri\Authority\UserInfo;
								    
    class AuthorityTest extends \PHPUnit_Framework_TestCase
    { 
        public function testToString()
        {
            $authority = new Authority(
                new Host('localhost')    
            );
            
            $this->assertSame($authority->__toString(), 'localhost');
            
            $authority = new Authority(
                new Host('localhost'),
                new UserInfo('bob')    
            );
            
            $this->assertSame($authority->__toString(), 'bob@localhost');
            
            $authority = new Authority(
                new Host('localhost'),
                new UserInfo('bob', 'secret')    
            );
            
            $this->assertSame($authority->__toString(), 'bob:secret@localhost');
            
            $authority = new Authority(
                new Host('localhost'),
                new UserInfo('bob', 'secret'),
                new Port(80)
            );
            
            $this->assertSame($authority->__toString(), 'bob:secret@localhost:80');
            
            $authority = new Authority(
                new Host('localhost'),
                new UserInfo('bob'),
                new Port(80)    
            );
            
            $this->assertSame($authority->__toString(), 'bob@localhost:80');
           
            $authority = new Authority(
                new Host('localhost'),
                null,
                new Port(80)    
            );
            
            $this->assertSame($authority->__toString(), 'localhost:80');
            
        }
        
        public function testGetUserInfo()
        {
            $authority = new Authority(
                new Host('localhost'),
                new UserInfo('bob')
            );
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\UserInfo', $authority->getUserInfo());
            
            $authority = new Authority(
                new Host('localhost')
            );
            
            $this->assertNull($authority->getUserInfo());
        }
        
        public function testSetUserInfo()
        {
            $authority = new Authority(
                new Host('localhost')
            );

            $authority->setUserInfo(new UserInfo('bob', 'secret'));
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\UserInfo', $authority->getUserInfo());
            
        }
        
        public function testGetHost()
        {
            $authority = new Authority(
                new Host('localhost')
            );
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\Host', $authority->getHost());
        }
        
        public function testSetHost()
        {
            $authority = new Authority(
                new Host('localhost')
            );
            
            $authority->setHost(new Host('foobar'));
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\Host', $authority->getHost());
            
        }
        
        public function testGetPort()
        {
            $authority = new Authority(
                new Host('localhost'),
                null,
                new Port(80)
            );
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\Port', $authority->getPort());
        }
        
        public function testSetPort()
        {
            $authority = new Authority(
                new Host('localhost')
            );
            
            $authority->setPort(new Port(80));
            
            $this->assertInstanceOf('\Aeon\HttpCore\Uri\Authority\Port', $authority->getPort());
        }
        
    }