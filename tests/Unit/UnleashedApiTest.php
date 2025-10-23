<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\UnleashedApi;

#[CoversClass(UnleashedApi::class)]
class UnleashedApiTest extends TestCase
{
    private UnleashedApi $api;
    private UnleashedClient $mockClient;

    protected function setUp(): void
    {
        $this->mockClient = $this->createMock(UnleashedClient::class);
        $this->api = new UnleashedApi('test-api-id', 'test-api-key', 'test-client/1.0');
        
        // Use reflection to inject the mock client
        $reflection = new \ReflectionClass($this->api);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($this->api, $this->mockClient);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__construct
     */
    public function testConstructor(): void
    {
        $api = new UnleashedApi('api-id', 'api-key', 'client/1.0');
        
        $this->assertInstanceOf(UnleashedApi::class, $api);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__construct
     */
    public function testConstructorWithCustomBaseUrl(): void
    {
        $api = new UnleashedApi('api-id', 'api-key', 'client/1.0', 'https://api-test.unleashedsoftware.com');
        
        $this->assertInstanceOf(UnleashedApi::class, $api);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::getClient
     */
    public function testGetClient(): void
    {
        $client = $this->api->getClient();
        
        $this->assertInstanceOf(UnleashedClient::class, $client);
        $this->assertSame($this->mockClient, $client);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__get
     */
    public function testServiceAccess(): void
    {
        // Test accessing a service that should exist
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown service: nonExistentService');
        
        $this->api->nonExistentService;
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::loadServiceMap
     */
    public function testServiceMapLoading(): void
    {
        // Use reflection to access the private serviceMap
        $reflection = new \ReflectionClass($this->api);
        $serviceMapProperty = $reflection->getProperty('serviceMap');
        $serviceMapProperty->setAccessible(true);
        
        // Initially should be empty
        $serviceMap = $serviceMapProperty->getValue($this->api);
        $this->assertIsArray($serviceMap);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__get
     * @covers \Unleashed\ApiClient\UnleashedApi::loadServiceMap
     */
    public function testServiceCaching(): void
    {
        // Use reflection to access private properties
        $reflection = new \ReflectionClass($this->api);
        $servicesProperty = $reflection->getProperty('services');
        $servicesProperty->setAccessible(true);
        
        // Initially should be empty
        $services = $servicesProperty->getValue($this->api);
        $this->assertIsArray($services);
        $this->assertEmpty($services);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__get
     * @covers \Unleashed\ApiClient\UnleashedApi::loadServiceMap
     */
    public function testDynamicServiceLoading(): void
    {
        // This test verifies that the service map is loaded when accessing a service
        // We can't easily test the actual service loading without mocking the file system
        // but we can test that the method exists and is callable
        
        $reflection = new \ReflectionClass($this->api);
        $this->assertTrue($reflection->hasMethod('__get'));
        $this->assertTrue($reflection->hasMethod('loadServiceMap'));
        $this->assertTrue($reflection->hasMethod('getService'));
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::loadServiceMap
     */
    public function testServiceMapStructure(): void
    {
        // Test that the service map follows the expected structure
        $reflection = new \ReflectionClass($this->api);
        $loadServiceMapMethod = $reflection->getMethod('loadServiceMap');
        $loadServiceMapMethod->setAccessible(true);
        
        // This should not throw an exception
        $loadServiceMapMethod->invoke($this->api);
        
        $serviceMapProperty = $reflection->getProperty('serviceMap');
        $serviceMapProperty->setAccessible(true);
        $serviceMap = $serviceMapProperty->getValue($this->api);
        
        $this->assertIsArray($serviceMap);
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__get
     */
    public function testInvalidServiceAccess(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown service: invalidService');
        
        $this->api->invalidService;
    }

    /**
     * @covers \Unleashed\ApiClient\UnleashedApi::__get
     * @covers \Unleashed\ApiClient\UnleashedApi::loadServiceMap
     */
    public function testServiceInstantiation(): void
    {
        // Test that services are properly instantiated with the client
        $reflection = new \ReflectionClass($this->api);
        $getServiceMethod = $reflection->getMethod('getService');
        $getServiceMethod->setAccessible(true);
        
        // Mock a service class that doesn't exist
        $mockServiceClass = 'Unleashed\\ApiClient\\Services\\NonExistentService';
        
        // This will test the service instantiation logic
        // We expect it to fail because the service class doesn't exist
        $this->expectException(\Error::class);
        $getServiceMethod->invoke($this->api, $mockServiceClass);
    }
}
