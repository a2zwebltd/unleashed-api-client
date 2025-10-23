<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Customer;
use Unleashed\ApiClient\Services\CustomersService;

#[CoversClass(CustomersService::class)]
class CustomersServiceTest extends TestCase
{
    private CustomersService $service;
    private UnleashedClient $mockClient;

    protected function setUp(): void
    {
        $this->mockClient = $this->createMock(UnleashedClient::class);
        $this->service = new CustomersService($this->mockClient);
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetAll(): void
    {
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-1',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer 1',
                    'Email' => 'test1@example.com'
                ],
                [
                    'Guid' => 'customer-2',
                    'CustomerCode' => 'CUST-002',
                    'CustomerName' => 'Test Customer 2',
                    'Email' => 'test2@example.com'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers')
            ->willReturn($expectedResponse);

        $result = $this->service->getAll();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertInstanceOf(Customer::class, $result[1]);
        $this->assertEquals('CUST-001', $result[0]->getCustomerCode());
        $this->assertEquals('Test Customer 1', $result[0]->getCustomerName());
        $this->assertEquals('test1@example.com', $result[0]->getEmail());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetAllWithFilters(): void
    {
        $filters = ['pageSize' => 10, 'orderBy' => 'CustomerCode'];
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-1',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer 1'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', $filters)
            ->willReturn($expectedResponse);

        $result = $this->service->getAll($filters);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getById
     */
    public function testGetById(): void
    {
        $customerId = 'customer-guid-123';
        $expectedResponse = [
            'Guid' => $customerId,
            'CustomerCode' => 'CUST-001',
            'CustomerName' => 'Test Customer',
            'Email' => 'test@example.com'
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with("/Customers/{$customerId}")
            ->willReturn($expectedResponse);

        $result = $this->service->getById($customerId);

        $this->assertInstanceOf(Customer::class, $result);
        $this->assertEquals($customerId, $result->getGuid());
        $this->assertEquals('CUST-001', $result->getCustomerCode());
        $this->assertEquals('Test Customer', $result->getCustomerName());
        $this->assertEquals('test@example.com', $result->getEmail());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::create
     */
    public function testCreate(): void
    {
        $customer = new Customer();
        $customer->setCustomerCode('CUST-001');
        $customer->setCustomerName('Test Customer');
        $customer->setEmail('test@example.com');

        $expectedResponse = [
            'Guid' => 'new-customer-guid',
            'CustomerCode' => 'CUST-001',
            'CustomerName' => 'Test Customer',
            'Email' => 'test@example.com'
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('post')
            ->with('/Customers', $customer->toArray())
            ->willReturn($expectedResponse);

        $result = $this->service->create($customer);

        $this->assertInstanceOf(Customer::class, $result);
        $this->assertEquals('new-customer-guid', $result->getGuid());
        $this->assertEquals('CUST-001', $result->getCustomerCode());
        $this->assertEquals('Test Customer', $result->getCustomerName());
        $this->assertEquals('test@example.com', $result->getEmail());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::update
     */
    public function testUpdate(): void
    {
        $customerId = 'customer-guid-123';
        $customer = new Customer();
        $customer->setGuid($customerId);
        $customer->setCustomerCode('CUST-001');
        $customer->setCustomerName('Updated Customer');
        $customer->setEmail('updated@example.com');

        $expectedResponse = [
            'Guid' => $customerId,
            'CustomerCode' => 'CUST-001',
            'CustomerName' => 'Updated Customer',
            'Email' => 'updated@example.com'
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('put')
            ->with("/Customers/{$customerId}", $customer->toArray())
            ->willReturn($expectedResponse);

        $result = $this->service->update($customerId, $customer);

        $this->assertIsArray($result);
        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::delete
     */
    public function testDelete(): void
    {
        $customerId = 'customer-guid-123';
        $expectedResponse = [];

        $this->mockClient
            ->expects($this->once())
            ->method('delete')
            ->with("/Customers/{$customerId}")
            ->willReturn($expectedResponse);

        $result = $this->service->delete($customerId);

        $this->assertIsArray($result);
        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetByCode(): void
    {
        $customerCode = 'CUST-001';
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer',
                    'Email' => 'test@example.com'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['customerCode' => $customerCode])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['customerCode' => $customerCode]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertEquals('CUST-001', $result[0]->getCustomerCode());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetByEmail(): void
    {
        $email = 'test@example.com';
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer',
                    'Email' => 'test@example.com'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['email' => $email])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['email' => $email]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertEquals('test@example.com', $result[0]->getEmail());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetByName(): void
    {
        $customerName = 'Test Customer';
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer',
                    'Email' => 'test@example.com'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['customerName' => $customerName])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['customerName' => $customerName]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertEquals('Test Customer', $result[0]->getCustomerName());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetObsolete(): void
    {
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Obsolete Customer',
                    'Obsolete' => true
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['isObsolete' => 'true'])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['isObsolete' => 'true']);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertTrue($result[0]->getObsolete());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetActive(): void
    {
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Active Customer',
                    'Obsolete' => false
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['isObsolete' => 'false'])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['isObsolete' => 'false']);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertFalse($result[0]->getObsolete());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testSearch(): void
    {
        $searchTerm = 'Test';
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer',
                    'Email' => 'test@example.com'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['search' => $searchTerm])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['search' => $searchTerm]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertEquals('Test Customer', $result[0]->getCustomerName());
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetWithPagination(): void
    {
        $pageSize = 10;
        $pageNumber = 2;
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['pageSize' => $pageSize, 'pageNumber' => $pageNumber])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['pageSize' => $pageSize, 'pageNumber' => $pageNumber]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
    }

    /**
     * @covers \Unleashed\ApiClient\Services\CustomersService::getAll
     */
    public function testGetSorted(): void
    {
        $orderBy = 'CustomerName';
        $orderDirection = 'asc';
        $expectedResponse = [
            'Items' => [
                [
                    'Guid' => 'customer-guid-123',
                    'CustomerCode' => 'CUST-001',
                    'CustomerName' => 'Test Customer'
                ]
            ]
        ];

        $this->mockClient
            ->expects($this->once())
            ->method('get')
            ->with('/Customers', ['orderBy' => $orderBy, 'orderDirection' => $orderDirection])
            ->willReturn($expectedResponse);

        $result = $this->service->getAll(['orderBy' => $orderBy, 'orderDirection' => $orderDirection]);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Customer::class, $result[0]);
    }
}
