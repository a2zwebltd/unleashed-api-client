<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit\DTO\EditableResources;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\DTO\EditableResources\Product;

#[CoversClass(Product::class)]
class ProductTest extends TestCase
{
    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::__construct
     */
    public function testProductCreation(): void
    {
        $product = new Product();

        $this->assertInstanceOf(Product::class, $product);
        $this->assertNull($product->getProductCode());
        $this->assertNull($product->getProductDescription());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductCode
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::getProductCode
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductDescription
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::getProductDescription
     */
    public function testProductSettersAndGetters(): void
    {
        $product = new Product();

        $product->setProductCode('TEST-001');
        $product->setProductDescription('Test Product');
        $product->setSellPrice(99.99);
        $product->setIsSellable(true);
        $product->setIsPurchasable(true);
        $product->setNotes('Test notes');

        $this->assertEquals('TEST-001', $product->getProductCode());
        $this->assertEquals('Test Product', $product->getProductDescription());
        $this->assertEquals(99.99, $product->getSellPrice());
        $this->assertTrue($product->getIsSellable());
        $this->assertTrue($product->getIsPurchasable());
        $this->assertEquals('Test notes', $product->getNotes());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::toArray
     */
    public function testProductToArray(): void
    {
        $product = new Product();
        $product->setProductCode('TEST-001');
        $product->setProductDescription('Test Product');
        $product->setSellPrice(99.99);
        $product->setIsSellable(true);

        $array = $product->toArray();

        $this->assertIsArray($array);
        $this->assertEquals('TEST-001', $array['ProductCode']);
        $this->assertEquals('Test Product', $array['ProductDescription']);
        $this->assertEquals(99.99, $array['DefaultSellPrice']);
        $this->assertTrue($array['IsSellable']);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::fromArray
     */
    public function testProductFromArray(): void
    {
        $data = [
            'ProductCode' => 'TEST-001',
            'ProductDescription' => 'Test Product',
            'DefaultSellPrice' => 99.99,
            'IsSellable' => true,
            'IsPurchasable' => false,
            'Guid' => 'test-guid-123',
        ];

        $product = Product::fromArray($data);

        $this->assertEquals('TEST-001', $product->getProductCode());
        $this->assertEquals('Test Product', $product->getProductDescription());
        $this->assertEquals(99.99, $product->getSellPrice());
        $this->assertTrue($product->getIsSellable());
        $this->assertFalse($product->getIsPurchasable());
        $this->assertEquals('test-guid-123', $product->getGuid());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::jsonSerialize
     */
    public function testProductJsonSerialization(): void
    {
        $product = new Product();
        $product->setProductCode('TEST-001');
        $product->setProductDescription('Test Product');
        $product->setSellPrice(99.99);

        $json = json_encode($product);
        $decoded = json_decode($json, true);

        $this->assertIsArray($decoded);
        $this->assertEquals('TEST-001', $decoded['ProductCode']);
        $this->assertEquals('Test Product', $decoded['ProductDescription']);
        $this->assertEquals(99.99, $decoded['DefaultSellPrice']);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::toArray
     */
    public function testProductWithAllFields(): void
    {
        $product = new Product();

        // Set all available fields
        $product->setProductCode('COMPLETE-001');
        $product->setProductDescription('Complete Product');
        $product->setBarcode('1234567890123');
        $product->setPackSize('12 units');
        $product->setWeight(1.5);
        $product->UnitOfMeasure = ['Code' => 'EA', 'Description' => 'Each'];
        $product->setProductType('Stock');
        $product->ProductGroup = ['Code' => 'ELEC', 'Description' => 'Electronics'];
        $product->ProductSubGroup = ['Code' => 'SMART', 'Description' => 'Smartphones'];
        $product->ProductBrand = ['Code' => 'TECH', 'Description' => 'TechBrand'];
        $product->setLastCost(50.00);
        $product->setAverageCost(55.00);
        $product->setStandardCost(60.00);
        $product->setSellPrice(99.99);
        $product->setSellPriceExTax(90.90);
        $product->setSellPriceIncTax(99.99);
        $product->setNotes('Product notes');
        $product->setComments('Internal comments');
        $product->setCopyCommentsForSales(true);
        $product->setCopyCommentsForPurchases(false);
        $product->setIsSellable(true);
        $product->setIsPurchasable(true);
        $product->setIsAssembledProduct(false);
        $product->setIsSerialized(false);
        $product->setIsBatchTracked(false);
        $product->setNeverDiminishing(false);
        $product->setObsolete(false);
        $product->setDefaultPurchaseUnitOfMeasure('Each');
        $product->setTaxablePurchase(true);
        $product->setTaxableSales(true);
        $product->setXeroTaxCode('GST');
        $product->setXeroTaxRate(10.0);
        $product->setXeroSalesTaxCode('GST');
        $product->setXeroSalesTaxRate(10.0);
        $product->setSupplierProductCode('SUPP-001');
        $product->setCommerceCode('12345678');
        $product->setCustomsDescription('Electronic device');
        $product->setIccCountryCode('US');
        $product->setIccCountryName('United States');

        $array = $product->toArray();

        // Verify all fields are present
        $this->assertEquals('COMPLETE-001', $array['ProductCode']);
        $this->assertEquals('Complete Product', $array['ProductDescription']);
        $this->assertEquals('1234567890123', $array['Barcode']);
        $this->assertEquals('12 units', $array['PackSize']);
        $this->assertEquals(1.5, $array['Weight']);
        $this->assertEquals(['Code' => 'EA', 'Description' => 'Each'], $array['UnitOfMeasure']);
        $this->assertEquals('Stock', $array['ProductType']);
        $this->assertEquals(['Code' => 'ELEC', 'Description' => 'Electronics'], $array['ProductGroup']);
        $this->assertEquals(['Code' => 'SMART', 'Description' => 'Smartphones'], $array['ProductSubGroup']);
        $this->assertEquals(['Code' => 'TECH', 'Description' => 'TechBrand'], $array['ProductBrand']);
        $this->assertEquals(50.00, $array['LastCost']);
        $this->assertEquals(55.00, $array['AverageCost']);
        $this->assertEquals(60.00, $array['StandardCost']);
        $this->assertEquals(99.99, $array['DefaultSellPrice']);
        $this->assertEquals(90.90, $array['SellPriceExTax']);
        $this->assertEquals(99.99, $array['SellPriceIncTax']);
        $this->assertEquals('Product notes', $array['Notes']);
        $this->assertEquals('Internal comments', $array['Comments']);
        $this->assertTrue($array['CopyCommentsForSales']);
        $this->assertFalse($array['CopyCommentsForPurchases']);
        $this->assertTrue($array['IsSellable']);
        $this->assertTrue($array['IsPurchasable']);
        $this->assertFalse($array['IsAssembledProduct']);
        $this->assertFalse($array['IsSerialized']);
        $this->assertFalse($array['IsBatchTracked']);
        $this->assertFalse($array['NeverDiminishing']);
        $this->assertFalse($array['Obsolete']);
        $this->assertEquals('Each', $array['DefaultPurchaseUnitOfMeasure']);
        $this->assertTrue($array['TaxablePurchase']);
        $this->assertTrue($array['TaxableSales']);
        $this->assertEquals('GST', $array['XeroTaxCode']);
        $this->assertEquals(10.0, $array['XeroTaxRate']);
        $this->assertEquals('GST', $array['XeroSalesTaxCode']);
        $this->assertEquals(10.0, $array['XeroSalesTaxRate']);
        $this->assertEquals('SUPP-001', $array['SupplierProductCode']);
        $this->assertEquals('12345678', $array['CommerceCode']);
        $this->assertEquals('Electronic device', $array['CustomsDescription']);
        // Check if properties are set correctly
        $this->assertEquals('US', $product->getIccCountryCode());
        $this->assertEquals('United States', $product->getIccCountryName());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductCode
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductDescription
     */
    public function testProductSettersReturnVoid(): void
    {
        $product = new Product();

        // Test that setters return void (not $this)
        $result = $product->setProductCode('TEST-001');
        $this->assertNull($result);

        $result = $product->setProductDescription('Test Product');
        $this->assertNull($result);

        $result = $product->setSellPrice(99.99);
        $this->assertNull($result);
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductCode
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::getProductCode
     */
    public function testProductNullValues(): void
    {
        $product = new Product();

        // Test that null values are handled correctly
        $product->setProductCode(null);
        $product->setProductDescription(null);
        $product->setSellPrice(null);

        $this->assertNull($product->getProductCode());
        $this->assertNull($product->getProductDescription());
        $this->assertNull($product->getSellPrice());
    }

    /**
     * @covers \Unleashed\ApiClient\DTO\EditableResources\Product::setProductCode
     */
    public function testProductBooleanFields(): void
    {
        $product = new Product();

        // Test boolean fields
        $product->setIsSellable(true);
        $product->setIsPurchasable(false);
        $product->setIsAssembledProduct(true);
        $product->setIsSerialized(false);
        $product->setIsBatchTracked(true);
        $product->setNeverDiminishing(false);
        $product->setObsolete(true);
        $product->setTaxablePurchase(false);
        $product->setTaxableSales(true);
        $product->setCopyCommentsForSales(false);
        $product->setCopyCommentsForPurchases(true);

        $this->assertTrue($product->getIsSellable());
        $this->assertFalse($product->getIsPurchasable());
        $this->assertTrue($product->getIsAssembledProduct());
        $this->assertFalse($product->getIsSerialized());
        $this->assertTrue($product->getIsBatchTracked());
        $this->assertFalse($product->getNeverDiminishing());
        $this->assertTrue($product->getObsolete());
        $this->assertFalse($product->getTaxablePurchase());
        $this->assertTrue($product->getTaxableSales());
        $this->assertFalse($product->getCopyCommentsForSales());
        $this->assertTrue($product->getCopyCommentsForPurchases());
    }
}
