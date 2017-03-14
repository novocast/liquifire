<?php

namespace Novocast\Liquifire;

class CapturePlusTest extends \PHPUnit_Framework_TestCase
{
    
    protected $config;
    
    public function __construct()
    {
        $this->config = include(__DIR__.'/../src/config/liquifire.php');
        
    }
    
    /**
     * Test if an Instance can be created.
     * @return void
     */
    public function testInstance()
    {
        $postcode_anywhere = new src\Liquifire($this->config);
        $this->assertInstanceOf('Novocast\Liquifire', $postcode_anywhere);
    }


    /**
     * @expectedException ErrorException
     */
    public function testConfigException()
    {
        $pa = new Liquifire([]);

    }
    
     /**
     * @expectedException ErrorException
     */
    public function testParamsException()
    {
        $pa = new Liquifire(['params' =>[] ]);

    }
    
     /**
     * @expectedException ErrorException
     */
    public function testParamsKeyException()
    {
        $pa = new Liquifire(['params' =>['key' => ''] ]);
    }
    
     /**
     * @expectedException ErrorException
     */
    public function testUrlException()
    {
        $pa = new Liquifire(['url' => '']);
    }
    
     /**
     * @expectedException ErrorException
     */
    public function testServicesException()
    {
        $pa = new \Liquifire(['services' => '']);
    }
    
     /**
     * @expectedException ErrorException
     */
    public function testEndpointsException()
    {

        $pa = new \Liquifire(['endpoints' => '']);
    }
       
    
    
    public function testArrayHasKey()
    {
        
        $pa = new \Liquifire($this->config);
        $this->assertNull($pa->serviceUrl);
        
    }
    
    
    public function testSetRequestType()
    {
        
        $pa = new \Liquifire($this->config);
        
        $pa->setRequestType([0 =>'find']);
        $this->assertEquals('find', $pa->requestType);
        
        $pa->setRequestType([0 => 'retrieve']);
        $this->assertEquals('retrieve', $pa->requestType);
        
    }
}
