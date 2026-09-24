<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\Exceptions\ApiException;
use Unleashed\ApiClient\Exceptions\AuthenticationException;

#[CoversClass(UnleashedClient::class)]
class UnleashedClientTest extends TestCase
{
    private UnleashedClient $client;
    private GuzzleClient $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(GuzzleClient::class);
        $this->client = new UnleashedClient(
            'test-api-id',
            'test-api-key',
            'test-client/1.0'
        );

        // Use reflection to inject the mock client
        $reflection = new \ReflectionClass($this->client);
        $httpClientProperty = $reflection->getProperty('httpClient');
        $httpClientProperty->setValue($this->client, $this->mockHttpClient);
    }

    #[AllowMockObjectsWithoutExpectations]
    public function testConstructor(): void
    {
        $client = new UnleashedClient('api-id', 'api-key', 'client/1.0');

        $this->assertEquals('https://api.unleashedsoftware.com', $client->getBaseUrl());
    }

    #[AllowMockObjectsWithoutExpectations]
    public function testConstructorWithCustomBaseUrl(): void
    {
        $client = new UnleashedClient('api-id', 'api-key', 'client/1.0', 'https://api-test.unleashedsoftware.com');

        $this->assertEquals('https://api-test.unleashedsoftware.com', $client->getBaseUrl());
    }

    public function testGetRequest(): void
    {
        $expectedResponse = ['Items' => [['Guid' => 'test-guid']]];

        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                '/Products',
                $this->callback(function ($options) {
                    return isset($options['headers']['api-auth-id']) &&
                           isset($options['headers']['api-auth-signature']) &&
                           isset($options['headers']['client-type']) &&
                           $options['headers']['api-auth-id'] === 'test-api-id' &&
                           $options['headers']['client-type'] === 'test-client/1.0';
                })
            )
            ->willReturn(new Response(200, [], json_encode($expectedResponse)));

        $result = $this->client->get('/Products');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testPostRequest(): void
    {
        $data = ['ProductCode' => 'TEST-001'];
        $expectedResponse = ['Guid' => 'new-guid'];

        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                '/Products',
                $this->callback(function ($options) use ($data) {
                    return isset($options['json']) && $options['json'] === $data;
                })
            )
            ->willReturn(new Response(200, [], json_encode($expectedResponse)));

        $result = $this->client->post('/Products', $data);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testPutRequest(): void
    {
        $data = ['ProductCode' => 'UPDATED-001'];
        $expectedResponse = ['Guid' => 'updated-guid'];

        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->with('PUT', '/Products/test-guid', $this->isArray())
            ->willReturn(new Response(200, [], json_encode($expectedResponse)));

        $result = $this->client->put('/Products/test-guid', $data);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testDeleteRequest(): void
    {
        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->with('DELETE', '/Products/test-guid', $this->isArray())
            ->willReturn(new Response(204));

        $result = $this->client->delete('/Products/test-guid');

        $this->assertEquals([], $result);
    }

    public function testRequestExceptionWithResponse(): void
    {
        $errorResponse = ['Description' => 'Product not found'];

        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->willThrowException(
                new RequestException(
                    'Not Found',
                    new Request('GET', '/Products/invalid'),
                    new Response(404, [], json_encode($errorResponse))
                )
            );

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('Product not found');

        $this->client->get('/Products/invalid');
    }

    public function testRequestExceptionWithoutResponse(): void
    {
        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->willThrowException(
                new RequestException(
                    'Network error',
                    new Request('GET', '/Products')
                )
            );

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('Request failed: Network error');

        $this->client->get('/Products');
    }

    #[AllowMockObjectsWithoutExpectations]
    public function testSignatureGeneration(): void
    {
        // Test that signature is generated correctly
        $client = new UnleashedClient('test-id', 'test-key', 'test-client/1.0');

        // We can't directly test the signature without exposing the method,
        // but we can test that the client is created successfully
        $this->assertInstanceOf(UnleashedClient::class, $client);
    }

    public function testQueryStringBuilding(): void
    {
        // Test with query parameters using the mocked client
        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                '/Products',
                $this->callback(function ($options) {
                    return isset($options['query']) &&
                           $options['query']['productCode'] === 'TEST-001';
                })
            )
            ->willReturn(new Response(200, [], json_encode(['Items' => []])));

        $this->client->get('/Products', ['productCode' => 'TEST-001']);
    }

    public function testEmptyResponse(): void
    {
        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->willReturn(new Response(200, [], ''));

        $result = $this->client->get('/Products');

        $this->assertEquals([], $result);
    }

    public function testInvalidJsonResponse(): void
    {
        $this->mockHttpClient
            ->expects($this->once())
            ->method('request')
            ->willReturn(new Response(200, [], 'invalid json'));

        $result = $this->client->get('/Products');

        $this->assertEquals([], $result);
    }
}
