<?php

    namespace AeonTest\HttpCore\Uri\Authority;
    
    use \Aeon\HttpCore\Uri\Authority\UserInfo;
    
    class UserInfoTest extends \PHPUnit_Framework_TestCase
    {          
        public function testToString()
        {
            $userInfo = new UserInfo('bob');
            
            $this->assertSame($userInfo->__toString(), 'bob@');
            
            $userInfo->setPassword('secret');
            
            $this->assertSame($userInfo->__toString(), 'bob:secret@');
        }
        
        public function testGetUser()
        {
            $userInfo = new UserInfo('bob');
            
            $this->assertSame($userInfo->getUser(), 'bob');
        }
        
        public function testSetUser()
        {
            $userInfo = new UserInfo('bob');
            
            $userInfo->setUser('foo');
            
            $this->assertSame($userInfo->getUser(), 'foo');
            
            $this->setExpectedException('InvalidArgumentException');
            
            $userInfo->setUser(1);
        }
        
        public function testGetPassword()
        {
            $userInfo = new UserInfo('bob', 'secret');
            
            $this->assertSame($userInfo->getPassword(), 'secret');
        }
        
        public function testSetPassword()
        {
            $userInfo = new UserInfo('bob', 'secret');
            
            $userInfo->setPassword('foo');
            
            $this->assertSame($userInfo->getPassword(), 'foo');
            
            $this->setExpectedException('InvalidArgumentException');
            
            $userInfo->setPassword(1);
        }
    }