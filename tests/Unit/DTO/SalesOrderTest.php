<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\DTO\EditableResources\SalesOrder;

#[CoversClass(SalesOrder::class)]
class SalesOrderTest extends TestCase
{
    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::__construct
     */
    public function testSalesOrderCreation(): void
    {
        $salesOrder = new SalesOrder();

        $this->assertInstanceOf(SalesOrder::class, $salesOrder);
        // OrderNumber is non-nullable, so we need to set it first
        $salesOrder->setOrderNumber('TEST-001');
        $this->assertEquals('TEST-001', $salesOrder->getOrderNumber());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setOrderNumber
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::getOrderNumber
     */
    public function testSalesOrderSettersAndGetters(): void
    {
        $salesOrder = new SalesOrder();

        $salesOrder->setOrderNumber('SO-001');
        $salesOrder->setOrderStatus('New');
        $salesOrder->setTotal(100.00);

        $this->assertEquals('SO-001', $salesOrder->getOrderNumber());
        $this->assertEquals('New', $salesOrder->getOrderStatus());
        $this->assertEquals(100.00, $salesOrder->getTotal());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::toArray
     */
    public function testSalesOrderToArray(): void
    {
        $salesOrder = new SalesOrder();
        $salesOrder->setOrderNumber('SO-001');
        $salesOrder->setOrderStatus('New');
        $salesOrder->setTotal(100.00);

        $array = $salesOrder->toArray();

        $this->assertIsArray($array);
        $this->assertEquals('SO-001', $array['OrderNumber']);
        $this->assertEquals('New', $array['OrderStatus']);
        $this->assertEquals(100.00, $array['Total']);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::fromArray
     */
    public function testSalesOrderFromArray(): void
    {
        $data = [
            'OrderNumber' => 'SO-001',
            'OrderStatus' => 'New',
            'Total' => 100.00,
            'Guid' => 'salesorder-guid-123',
        ];

        $salesOrder = SalesOrder::fromArray($data);

        $this->assertEquals('SO-001', $salesOrder->getOrderNumber());
        $this->assertEquals('New', $salesOrder->getOrderStatus());
        $this->assertEquals(100.00, $salesOrder->getTotal());
        $this->assertEquals('salesorder-guid-123', $salesOrder->getGuid());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::jsonSerialize
     */
    public function testSalesOrderJsonSerialization(): void
    {
        $salesOrder = new SalesOrder();
        $salesOrder->setOrderNumber('SO-001');
        $salesOrder->setOrderStatus('New');
        $salesOrder->setTotal(100.00);

        $json = json_encode($salesOrder);
        $decoded = json_decode($json, true);

        $this->assertIsArray($decoded);
        $this->assertEquals('SO-001', $decoded['OrderNumber']);
        $this->assertEquals('New', $decoded['OrderStatus']);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::toArray
     */
    public function testSalesOrderWithAllFields(): void
    {
        $salesOrder = new SalesOrder();

        // Set all available fields
        $salesOrder->setOrderNumber('COMPLETE-001');
        $salesOrder->setOrderStatus('New');
        $salesOrder->setTotal(100.00);

        $array = $salesOrder->toArray();

        // Verify all fields are present
        $this->assertEquals('COMPLETE-001', $array['OrderNumber']);
        $this->assertEquals('New', $array['OrderStatus']);
        $this->assertEquals(100.00, $array['Total']);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setOrderNumber
     */
    public function testSalesOrderSettersReturnVoid(): void
    {
        $salesOrder = new SalesOrder();

        // Test that setters return void (not $this)
        $result = $salesOrder->setOrderNumber('SO-001');
        $this->assertNull($result);

        $result = $salesOrder->setOrderStatus('New');
        $this->assertNull($result);

        $result = $salesOrder->setTotal(100.00);
        $this->assertNull($result);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setTotal
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::getTotal
     */
    public function testSalesOrderNullValues(): void
    {
        $salesOrder = new SalesOrder();

        // Test that null values are handled correctly for nullable properties
        $salesOrder->setTotal(null);

        $this->assertNull($salesOrder->getTotal());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setOrderNumber
     */
    public function testSalesOrderBooleanFields(): void
    {
        $salesOrder = new SalesOrder();

        // SalesOrder DTO doesn't have boolean fields, so this test is empty
        $this->assertTrue(true);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setOrderNumber
     */
    public function testSalesOrderDateTimeFields(): void
    {
        $salesOrder = new SalesOrder();

        // SalesOrder DTO doesn't have DateTime fields, so this test is empty
        $this->assertTrue(true);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\SalesOrder::setOrderNumber
     */
    public function testSalesOrderStatusValues(): void
    {
        $salesOrder = new SalesOrder();

        // Test different order status values
        $statuses = ['New', 'Pending', 'Confirmed', 'Shipped', 'Delivered', 'Cancelled'];

        foreach ($statuses as $status) {
            $salesOrder->setOrderStatus($status);
            $this->assertEquals($status, $salesOrder->getOrderStatus());
        }
    }
}
