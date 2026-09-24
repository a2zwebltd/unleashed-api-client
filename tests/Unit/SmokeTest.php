<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Customer;
use Unleashed\ApiClient\Services\CustomersService;
use Unleashed\ApiClient\UnleashedApi;

#[CoversClass(UnleashedApi::class)]
#[CoversClass(UnleashedClient::class)]
#[CoversClass(CustomersService::class)]
class SmokeTest extends TestCase
{
    /**
     * Every service documented in the README must resolve as a property.
     *
     * @return array<string, array{string}>
     */
    public static function serviceNames(): array
    {
        $names = [
            'accounts', 'assemblies', 'attributeSets', 'batchNumbers', 'billOfMaterials',
            'companies', 'creditNotes', 'currencies', 'customerDeliveryAddress', 'customerTypes',
            'customers', 'deliveryMethods', 'paymentTerms', 'productBrands', 'productGroups',
            'productPrices', 'products', 'purchaseOrders', 'recostAdjustment', 'salesInvoices',
            'salesOrderGroup', 'salesOrders', 'salesQuotes', 'salesShipments', 'salespersons',
            'sellPriceTier', 'serialNumbers', 'shippingCompanies', 'stockAdjustments', 'stockCounts',
            'stockOnHand', 'supplierReturnReason', 'supplierReturns', 'suppliers', 'taxes',
            'unitOfMeasures', 'warehouseStockTransfer', 'warehouses',
        ];

        return array_combine($names, array_map(fn (string $n) => [$n], $names));
    }

    #[DataProvider('serviceNames')]
    public function testServiceIsReachable(string $name): void
    {
        $api = new UnleashedApi('id', 'key', 'test/1.0');

        $service = $api->{$name};

        $this->assertIsObject($service);
        $this->assertSame($service, $api->{$name});
        $this->assertStringStartsWith('Unleashed\\ApiClient\\Services\\', $service::class);
    }

    public function testCustomersGetAllThroughMockedGuzzleHandler(): void
    {
        $history = [];
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], (string) json_encode([
                'Pagination' => ['NumberOfItems' => 1, 'PageSize' => 200, 'PageNumber' => 1, 'NumberOfPages' => 1],
                'Items' => [['Guid' => 'abc-123', 'CustomerCode' => 'CUST001', 'CustomerName' => 'Acme']],
            ])),
        ]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));

        $api = new UnleashedApi('test-id', 'test-key', 'test/1.0');
        $property = (new \ReflectionClass($api->getClient()))->getProperty('httpClient');
        $property->setValue($api->getClient(), new GuzzleClient([
            'base_uri' => 'https://api.unleashedsoftware.com',
            'handler' => $stack,
        ]));

        $customers = $api->customers->getAll(['customerCode' => 'CUST001']);

        $this->assertCount(1, $customers);
        $this->assertInstanceOf(Customer::class, $customers[0]);
        $this->assertSame('CUST001', $customers[0]->getCustomerCode());

        $this->assertCount(1, $history);
        $request = $history[0]['request'];
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('/Customers', $request->getUri()->getPath());
        $this->assertSame('test-id', $request->getHeaderLine('api-auth-id'));
        $this->assertSame('test/1.0', $request->getHeaderLine('client-type'));
        $this->assertNotSame('', $request->getHeaderLine('api-auth-signature'));
    }
}
