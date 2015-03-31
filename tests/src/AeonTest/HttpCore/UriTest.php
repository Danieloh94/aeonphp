<?php

    namespace AeonTest\HttpCore;
    
    use \Aeon\HttpCore\Uri\Scheme;
    use \Aeon\HttpCore\Uri\Authority;
    use \Aeon\HttpCore\Uri\Authority\Host;
    use \Aeon\HttpCore\Uri\Authority\Port;
    use \Aeon\HttpCore\Uri\Authority\UserInfo;
    use \Aeon\HttpCore\Uri\Path;
    use \Aeon\HttpCore\Uri\Query;
    use \Aeon\HttpCore\Uri\Fragment;
    use \Aeon\HttpCore\Uri;
    
    class UriTest extends \PHPUnit_Framework_TestCase
    {
        public function testToString()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost'),
                    new UserInfo('bob', 'secret'),
                    new Port(80)
                ),
                new Scheme('http'),
                new Path('foo/bar'),
                new Query('name=bob'),
                new Fragment('hello')
            );
            
            $this->assertSame('http://bob:secret@localhost:80/foo/bar/?name=bob#hello', $uri->__toString());
        }
        
        public function testGetAuthority()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost'),
                    new UserInfo('bob'),
                    new Port(80)  
                )
            );
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\AuthorityContract', $uri->getAuthority());
        }
        
        public function testSetAuthority()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $uri->setAuthority(new Authority(
                new Host('www.example.com') 
            ));
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\AuthorityContract', $uri->getAuthority());
        }
        
        public function testGetScheme()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $this->assertNull($uri->getScheme());
            
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                ),
                new Scheme('http')
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Uri\SchemeContract', $uri->getScheme());
        }
        
        public function testSetScheme()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $uri->setScheme(new Scheme('http'));
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\SchemeContract', $uri->getScheme());
        }
        
        public function testGetPath()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $this->assertNull($uri->getPath());
            
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                ),
                null,
                new Path('/foo/bar/')
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Uri\PathContract', $uri->getPath());
        }
        
        public function testSetPath()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $uri->setPath(new Path('foo/bar'));
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Uri\PathContract', $uri->getPath());
        }
        
        public function testGetQuery()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $this->assertNull($uri->getQuery());
            
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                ),
                null,
                null,
                new Query('name=bob')
            );
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\QueryContract', $uri->getQuery()); 
        }
        
        public function testSetQuery()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $uri->setQuery(new Query('?name=bob'));
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\QueryContract', $uri->getQuery());
        }
        
        public function testGetFragment()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $this->assertNull($uri->getFragment());
            
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                ),
                null,
                null,
                null,
                new Fragment('#hello')
            );
            
            $this->assertInstanceOf('Aeon\Contract\HttpCore\Uri\FragmentContract', $uri->getFragment());
        }
        
        public function testSetFragment()
        {
            $uri = new Uri(
                new Authority(
                    new Host('localhost')
                )
            );
            
            $uri->setFragment(new Fragment('#href'));
            
            $this->assertInstanceOf('\Aeon\Contract\HttpCore\Uri\FragmentContract', $uri->getFragment());
        }
    }