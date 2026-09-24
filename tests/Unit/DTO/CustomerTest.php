<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\DTO\EditableResources\Customer;

#[CoversClass(Customer::class)]
class CustomerTest extends TestCase
{
    public function testCustomerCreation(): void
    {
        $customer = new Customer();

        $this->assertInstanceOf(Customer::class, $customer);
        // CustomerCode and CustomerName are non-nullable, so we need to set them first
        $customer->setCustomerCode('TEST-001');
        $customer->setCustomerName('Test Customer');
        $this->assertEquals('TEST-001', $customer->getCustomerCode());
        $this->assertEquals('Test Customer', $customer->getCustomerName());
    }

    public function testCustomerSettersAndGetters(): void
    {
        $customer = new Customer();

        $customer->setCustomerCode('CUST-001');
        $customer->setCustomerName('Test Customer');
        $customer->setEmail('test@example.com');
        $customer->setPhoneNumber('123-456-7890');
        $customer->MobileNumber = '098-765-4321';
        $customer->FaxNumber = '555-123-4567';
        $customer->Website = 'https://example.com';
        $customer->Notes = 'Customer notes';
        $customer->Obsolete = false;

        $this->assertEquals('CUST-001', $customer->getCustomerCode());
        $this->assertEquals('Test Customer', $customer->getCustomerName());
        $this->assertEquals('test@example.com', $customer->getEmail());
        $this->assertEquals('123-456-7890', $customer->getPhoneNumber());
        $this->assertEquals('098-765-4321', $customer->MobileNumber);
        $this->assertEquals('555-123-4567', $customer->FaxNumber);
        $this->assertEquals('https://example.com', $customer->Website);
        $this->assertEquals('Customer notes', $customer->Notes);
        $this->assertFalse($customer->Obsolete);
    }

    public function testCustomerToArray(): void
    {
        $customer = new Customer();
        $customer->setCustomerCode('CUST-001');
        $customer->setCustomerName('Test Customer');
        $customer->setEmail('test@example.com');
        $customer->setPhoneNumber('123-456-7890');

        $array = $customer->toArray();

        $this->assertIsArray($array);
        $this->assertEquals('CUST-001', $array['CustomerCode']);
        $this->assertEquals('Test Customer', $array['CustomerName']);
        $this->assertEquals('test@example.com', $array['Email']);
        $this->assertEquals('123-456-7890', $array['PhoneNumber']);
    }

    public function testCustomerFromArray(): void
    {
        $data = [
            'CustomerCode' => 'CUST-001',
            'CustomerName' => 'Test Customer',
            'Email' => 'test@example.com',
            'PhoneNumber' => '123-456-7890',
            'MobileNumber' => '098-765-4321',
            'Guid' => 'customer-guid-123',
        ];

        $customer = Customer::fromArray($data);

        $this->assertEquals('CUST-001', $customer->getCustomerCode());
        $this->assertEquals('Test Customer', $customer->getCustomerName());
        $this->assertEquals('test@example.com', $customer->getEmail());
        $this->assertEquals('123-456-7890', $customer->getPhoneNumber());
        $this->assertEquals('098-765-4321', $customer->MobileNumber);
        $this->assertEquals('customer-guid-123', $customer->getGuid());
    }

    public function testCustomerJsonSerialization(): void
    {
        $customer = new Customer();
        $customer->setCustomerCode('CUST-001');
        $customer->setCustomerName('Test Customer');
        $customer->setEmail('test@example.com');

        $json = json_encode($customer);
        $decoded = json_decode($json, true);

        $this->assertIsArray($decoded);
        $this->assertEquals('CUST-001', $decoded['CustomerCode']);
        $this->assertEquals('Test Customer', $decoded['CustomerName']);
        $this->assertEquals('test@example.com', $decoded['Email']);
    }

    public function testCustomerWithAllFields(): void
    {
        $customer = new Customer();

        // Set all available fields
        $customer->setCustomerCode('COMPLETE-001');
        $customer->setCustomerName('Complete Customer');
        $customer->setEmail('complete@example.com');
        $customer->setPhoneNumber('123-456-7890');
        $customer->MobileNumber = '098-765-4321';
        $customer->FaxNumber = '555-123-4567';
        $customer->Website = 'https://complete.com';
        $customer->Notes = 'Complete customer notes';
        $customer->Obsolete = false;
        $customer->CreatedBy = 'System';
        $customer->LastModifiedBy = 'Admin';
        $customer->setLastModifiedOn(new \DateTime('2023-01-01 12:00:00'));

        $array = $customer->toArray();

        // Verify all fields are present
        $this->assertEquals('COMPLETE-001', $array['CustomerCode']);
        $this->assertEquals('Complete Customer', $array['CustomerName']);
        $this->assertEquals('complete@example.com', $array['Email']);
        $this->assertEquals('123-456-7890', $array['PhoneNumber']);
        $this->assertEquals('098-765-4321', $array['MobileNumber']);
        $this->assertEquals('555-123-4567', $array['FaxNumber']);
        $this->assertEquals('https://complete.com', $array['Website']);
        $this->assertEquals('Complete customer notes', $array['Notes']);
        $this->assertFalse($array['Obsolete']);
        $this->assertEquals('System', $array['CreatedBy']);
        $this->assertEquals('Admin', $array['LastModifiedBy']);
    }

    public function testCustomerSettersReturnVoid(): void
    {
        $customer = new Customer();

        // Test that setters return void (not $this)
        $result = $customer->setCustomerCode('CUST-001');
        $this->assertNull($result);

        $result = $customer->setCustomerName('Test Customer');
        $this->assertNull($result);

        $result = $customer->setEmail('test@example.com');
        $this->assertNull($result);
    }

    public function testCustomerNullValues(): void
    {
        $customer = new Customer();

        // Test that null values are handled correctly for nullable properties
        $customer->setEmail(null);
        $customer->setPhoneNumber(null);

        $this->assertNull($customer->getEmail());
        $this->assertNull($customer->getPhoneNumber());
    }

    public function testCustomerBooleanFields(): void
    {
        $customer = new Customer();

        // Test boolean fields
        $customer->Obsolete = true;

        $this->assertTrue($customer->Obsolete);

        $customer->Obsolete = false;
        $this->assertFalse($customer->Obsolete);
    }

    public function testCustomerDateTimeFields(): void
    {
        $customer = new Customer();

        $dateTime = new \DateTime('2023-01-01 12:00:00');
        $customer->setLastModifiedOn($dateTime);

        $this->assertInstanceOf(\DateTimeInterface::class, $customer->getLastModifiedOn());
        $this->assertEquals($dateTime, $customer->getLastModifiedOn());

        // Test null datetime
        $customer->setLastModifiedOn(null);
        $this->assertNull($customer->getLastModifiedOn());
    }
}
