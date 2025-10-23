# Unleashed API Client

A comprehensive PHP client library for the Unleashed Software API, providing full CRUD operations and advanced features for all supported endpoints.

> 📖 **Official API Documentation**: [https://apidocs.unleashedsoftware.com/](https://apidocs.unleashedsoftware.com/)


## 📦 Installation

```bash
composer require unleashed/api-client
```

## 🔧 Configuration

```php
use Unleashed\ApiClient\UnleashedApi;

$api = new UnleashedApi(
    'your-api-id',
    'your-api-key',
    'your-client-type',
    'https://api.unleashedsoftware.com' // Optional
);
```

## 🎯 Quick Start

### Basic Usage

```php
// Get all customers
$customers = $api->customers->getAll();

// Get a specific customer
$customer = $api->customers->getById('customer-guid');

// Create a new customer
$newCustomer = new Customer();
$newCustomer->setCustomerCode('CUST001');
$newCustomer->setCustomerName('John Doe');
$newCustomer->setEmail('john@example.com');

$createdCustomer = $api->customers->create($newCustomer);

// Update a customer
$customer->setPhoneNumber('+1234567890');
$updatedCustomer = $api->customers->update($customer);

// Delete a customer
$api->customers->delete($customer->getGuid());
```

### Advanced Filtering

```php
// Get customers with filters
$customers = $api->customers->getAll([
    'customerCode' => 'CUST*',
    'modifiedSince' => '2024-01-01',
    'pageSize' => 50
]);

// Get products by group
$products = $api->products->getAll([
    'productGroup' => 'Electronics',
    'isObsolete' => false
]);
```

## 📚 Complete API Reference

### 🔧 All Available Services and Methods

#### **Accounts** (Read-only)
```php
$api->accounts->getAll($filters = [])           // Get all accounts
$api->accounts->getById($guid)                   // Get account by GUID
```
**Parameters:**
- `$filters`: `['modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Assemblies** (Full CRUD)
```php
$api->assemblies->getAll($filters = [])          // Get all assemblies
$api->assemblies->getById($guid)                 // Get assembly by GUID
$api->assemblies->create($assembly)              // Create new assembly
$api->assemblies->update($assembly)              // Update assembly
$api->assemblies->delete($guid)                  // Delete assembly
$api->assemblies->addLine($guid, $lineDto)       // Add assembly line
$api->assemblies->updateLine($guid, $lineGuid, $lineDto) // Update assembly line
$api->assemblies->deleteLine($guid, $lineGuid)   // Delete assembly line
$api->assemblies->complete($guid)                // Complete assembly
```
**Parameters:**
- `$filters`: `['assemblyNumber' => 'ASM*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$assembly`: `Assembly` DTO object
- `$lineDto`: `AssemblyLine` DTO object

#### **Attribute Sets** (Full CRUD)
```php
$api->attributeSets->getAll($filters = [])      // Get all attribute sets
$api->attributeSets->getById($guid)              // Get attribute set by GUID
$api->attributeSets->create($attributeSet)       // Create new attribute set
$api->attributeSets->update($attributeSet)       // Update attribute set
$api->attributeSets->delete($guid)               // Delete attribute set
```
**Parameters:**
- `$filters`: `['attributeSetName' => 'Color*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$attributeSet`: `AttributeSet` DTO object

#### **Batch Numbers** (Read-only)
```php
$api->batchNumbers->getAll($filters = [])       // Get all batch numbers
$api->batchNumbers->getById($guid)              // Get batch number by GUID
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'batchNumber' => 'BATCH*', 'pageSize' => 50]`

#### **Bill of Materials** (Full CRUD)
```php
$api->billOfMaterials->getAll($filters = [])    // Get all BOMs
$api->billOfMaterials->getById($guid)           // Get BOM by GUID
$api->billOfMaterials->create($bom)             // Create new BOM
$api->billOfMaterials->update($bom)             // Update BOM
$api->billOfMaterials->delete($guid)             // Delete BOM
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$bom`: `BillOfMaterial` DTO object

#### **Companies** (Read-only)
```php
$api->companies->getAll($filters = [])           // Get all companies
$api->companies->getById($guid)                 // Get company by GUID
```
**Parameters:**
- `$filters`: `['companyName' => 'Company*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Credit Notes** (Full CRUD)
```php
$api->creditNotes->getAll($filters = [])        // Get all credit notes
$api->creditNotes->getById($guid)              // Get credit note by GUID
$api->creditNotes->create($creditNote)         // Create new credit note
$api->creditNotes->update($creditNote)         // Update credit note
$api->creditNotes->delete($guid)               // Delete credit note
```
**Parameters:**
- `$filters`: `['creditNoteNumber' => 'CN*', 'customerCode' => 'CUST*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$creditNote`: `CreditNote` DTO object

#### **Customers** (Full CRUD)
```php
$api->customers->getAll($filters = [])           // Get all customers
$api->customers->getById($guid)                 // Get customer by GUID
$api->customers->getByCode($code)               // Get customer by code
$api->customers->create($customer)              // Create new customer
$api->customers->update($customer)              // Update customer
$api->customers->delete($guid)                   // Delete customer
```
**Parameters:**
- `$filters`: `['customerCode' => 'CUST*', 'customerName' => 'Customer*', 'email' => 'email@domain.com', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$customer`: `Customer` DTO object

#### **Product Prices** (Read-only)
```php
$api->productPrices->getAll($filters = [])      // Get all product prices
$api->productPrices->getById($guid)            // Get product price by GUID
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'priceListCode' => 'PL*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Products** (Full CRUD)
```php
$api->products->getAll($filters = [])            // Get all products
$api->products->getById($guid)                  // Get product by GUID
$api->products->getByCode($code)                // Get product by code
$api->products->create($product)               // Create new product
$api->products->update($product)                // Update product
$api->products->delete($guid)                   // Delete product
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'productName' => 'Product*', 'productGroup' => 'Group*', 'isObsolete' => false, 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$product`: `Product` DTO object

#### **Purchase Orders** (Full CRUD)
```php
$api->purchaseOrders->getAll($filters = [])     // Get all purchase orders
$api->purchaseOrders->getById($guid)           // Get purchase order by GUID
$api->purchaseOrders->getByNumber($number)    // Get purchase order by number
$api->purchaseOrders->create($purchaseOrder)    // Create new purchase order
$api->purchaseOrders->update($purchaseOrder)    // Update purchase order
$api->purchaseOrders->delete($guid)             // Delete purchase order
```
**Parameters:**
- `$filters`: `['orderNumber' => 'PO*', 'supplierCode' => 'SUPP*', 'status' => 'Parked', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$purchaseOrder`: `PurchaseOrder` DTO object

#### **Sales Invoices** (Read-only)
```php
$api->salesInvoices->getAll($filters = [])      // Get all sales invoices
$api->salesInvoices->getById($guid)            // Get sales invoice by GUID
```
**Parameters:**
- `$filters`: `['invoiceNumber' => 'INV*', 'customerCode' => 'CUST*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Sales Orders** (Full CRUD)
```php
$api->salesOrders->getAll($filters = [])        // Get all sales orders
$api->salesOrders->getById($guid)              // Get sales order by GUID
$api->salesOrders->getByNumber($number)        // Get sales order by number
$api->salesOrders->create($salesOrder)         // Create new sales order
$api->salesOrders->update($salesOrder)         // Update sales order
$api->salesOrders->delete($guid)               // Delete sales order
```
**Parameters:**
- `$filters`: `['orderNumber' => 'SO*', 'customerCode' => 'CUST*', 'status' => 'Parked', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$salesOrder`: `SalesOrder` DTO object

#### **Sales Quotes** (Read-only)
```php
$api->salesQuotes->getAll($filters = [])       // Get all sales quotes
$api->salesQuotes->getById($guid)              // Get sales quote by GUID
```
**Parameters:**
- `$filters`: `['quoteNumber' => 'SQ*', 'customerCode' => 'CUST*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Sales Persons** (Full CRUD)
```php
$api->salesPersons->getAll($filters = [])       // Get all sales persons
$api->salesPersons->getById($guid)             // Get sales person by GUID
$api->salesPersons->getByCode($code)           // Get sales person by code
$api->salesPersons->create($salesPerson)       // Create new sales person
$api->salesPersons->update($salesPerson)       // Update sales person
$api->salesPersons->delete($guid)              // Delete sales person
```
**Parameters:**
- `$filters`: `['salesPersonCode' => 'SP*', 'salesPersonName' => 'Person*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$salesPerson`: `SalesPerson` DTO object

#### **Sales Shipments** (Full CRUD)
```php
$api->salesShipments->getAll($filters = [])     // Get all sales shipments
$api->salesShipments->getById($guid)           // Get sales shipment by GUID
$api->salesShipments->create($salesShipment)   // Create new sales shipment
$api->salesShipments->update($salesShipment)   // Update sales shipment
$api->salesShipments->delete($guid)            // Delete sales shipment
```
**Parameters:**
- `$filters`: `['shipmentNumber' => 'SH*', 'customerCode' => 'CUST*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$salesShipment`: `SalesShipment` DTO object

#### **Serial Numbers** (Read-only)
```php
$api->serialNumbers->getAll($filters = [])     // Get all serial numbers
$api->serialNumbers->getById($guid)           // Get serial number by GUID
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'serialNumber' => 'SN*', 'pageSize' => 50]`

#### **Shipping Companies** (Read-only)
```php
$api->shippingCompanies->getAll($filters = []) // Get all shipping companies
$api->shippingCompanies->getById($guid)       // Get shipping company by GUID
```
**Parameters:**
- `$filters`: `['companyName' => 'Company*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Stock Adjustments** (Full CRUD)
```php
$api->stockAdjustments->getAll($filters = [])  // Get all stock adjustments
$api->stockAdjustments->getById($guid)        // Get stock adjustment by GUID
$api->stockAdjustments->create($adjustment)   // Create new stock adjustment
$api->stockAdjustments->update($adjustment)   // Update stock adjustment
$api->stockAdjustments->delete($guid)         // Delete stock adjustment
```
**Parameters:**
- `$filters`: `['adjustmentNumber' => 'ADJ*', 'warehouseCode' => 'WH*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$adjustment`: `StockAdjustment` DTO object

#### **Stock Counts** (Read-only)
```php
$api->stockCounts->getAll($filters = [])      // Get all stock counts
$api->stockCounts->getById($guid)             // Get stock count by GUID
```
**Parameters:**
- `$filters`: `['countNumber' => 'CNT*', 'warehouseCode' => 'WH*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Stock On Hand** (Read-only)
```php
$api->stockOnHand->getAll($filters = [])       // Get all stock on hand
$api->stockOnHand->getById($guid)             // Get stock on hand by GUID
$api->stockOnHand->getByProduct($productGuid) // Get stock on hand by product
```
**Parameters:**
- `$filters`: `['productCode' => 'PROD*', 'warehouseCode' => 'WH*', 'warehouseName' => 'Warehouse*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Supplier Returns** (Full CRUD)
```php
$api->supplierReturns->getAll($filters = []) // Get all supplier returns
$api->supplierReturns->getById($guid)       // Get supplier return by GUID
$api->supplierReturns->create($return)       // Create new supplier return
$api->supplierReturns->update($return)       // Update supplier return
$api->supplierReturns->delete($guid)         // Delete supplier return
```
**Parameters:**
- `$filters`: `['returnNumber' => 'SR*', 'supplierCode' => 'SUPP*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$return`: `SupplierReturn` DTO object

#### **Suppliers** (Read-only)
```php
$api->suppliers->getAll($filters = [])        // Get all suppliers
$api->suppliers->getById($guid)              // Get supplier by GUID
```
**Parameters:**
- `$filters`: `['supplierCode' => 'SUPP*', 'supplierName' => 'Supplier*', 'email' => 'email@domain.com', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Warehouse Stock Transfers** (Full CRUD)
```php
$api->warehouseStockTransfers->getAll($filters = []) // Get all warehouse stock transfers
$api->warehouseStockTransfers->getById($guid)        // Get warehouse stock transfer by GUID
$api->warehouseStockTransfers->create($transfer)     // Create new warehouse stock transfer
$api->warehouseStockTransfers->update($transfer)     // Update warehouse stock transfer
$api->warehouseStockTransfers->delete($guid)          // Delete warehouse stock transfer
$api->warehouseStockTransfers->addLine($guid, $lineDto) // Add transfer line
$api->warehouseStockTransfers->updateLine($guid, $lineGuid, $lineDto) // Update transfer line
$api->warehouseStockTransfers->deleteLine($guid, $lineGuid) // Delete transfer line
$api->warehouseStockTransfers->complete($guid)       // Complete warehouse stock transfer
```
**Parameters:**
- `$filters`: `['transferNumber' => 'TX*', 'sourceWarehouse' => 'WH*', 'destinationWarehouse' => 'WH*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$transfer`: `WarehouseStockTransfer` DTO object
- `$lineDto`: `WarehouseStockTransferLine` DTO object

#### **Currencies** (Read-only)
```php
$api->currencies->getAll($filters = [])             // Get all currencies
$api->currencies->getById($guid)                    // Get currency by GUID
```
**Parameters:**
- `$filters`: `['currencyCode' => 'USD', 'currencyName' => 'Dollar*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Customer Delivery Address** (Full CRUD)
```php
$api->customerDeliveryAddress->getAll($filters = []) // Get all customer delivery addresses
$api->customerDeliveryAddress->getById($guid)        // Get customer delivery address by GUID
$api->customerDeliveryAddress->create($address)     // Create new customer delivery address
$api->customerDeliveryAddress->update($address)      // Update customer delivery address
$api->customerDeliveryAddress->delete($guid)         // Delete customer delivery address
```
**Parameters:**
- `$filters`: `['customerCode' => 'CUST*', 'addressName' => 'Address*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`
- `$address`: `CustomerDeliveryAddress` DTO object

#### **Customer Types** (Read-only)
```php
$api->customerTypes->getAll($filters = [])          // Get all customer types
$api->customerTypes->getById($guid)                 // Get customer type by GUID
```
**Parameters:**
- `$filters`: `['customerTypeName' => 'Type*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Delivery Methods** (Read-only)
```php
$api->deliveryMethods->getAll($filters = [])        // Get all delivery methods
$api->deliveryMethods->getById($guid)               // Get delivery method by GUID
```
**Parameters:**
- `$filters`: `['deliveryMethodName' => 'Method*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Payment Terms** (Read-only)
```php
$api->paymentTerms->getAll($filters = [])           // Get all payment terms
$api->paymentTerms->getById($guid)                 // Get payment term by GUID
```
**Parameters:**
- `$filters`: `['paymentTermName' => 'Term*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Product Brands** (Read-only)
```php
$api->productBrands->getAll($filters = [])          // Get all product brands
$api->productBrands->getById($guid)                 // Get product brand by GUID
```
**Parameters:**
- `$filters`: `['brandName' => 'Brand*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Product Groups** (Read-only)
```php
$api->productGroups->getAll($filters = [])          // Get all product groups
$api->productGroups->getById($guid)                 // Get product group by GUID
```
**Parameters:**
- `$filters`: `['groupName' => 'Group*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Recost Adjustment** (Read-only)
```php
$api->recostAdjustment->getAll($filters = [])       // Get all recost adjustments
$api->recostAdjustment->getById($guid)              // Get recost adjustment by GUID
```
**Parameters:**
- `$filters`: `['adjustmentNumber' => 'RA*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Sales Order Group** (Read-only)
```php
$api->salesOrderGroup->getAll($filters = [])        // Get all sales order groups
$api->salesOrderGroup->getById($guid)              // Get sales order group by GUID
```
**Parameters:**
- `$filters`: `['groupName' => 'Group*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Sell Price Tier** (Read-only)
```php
$api->sellPriceTier->getAll($filters = [])          // Get all sell price tiers
$api->sellPriceTier->getById($guid)                 // Get sell price tier by GUID
```
**Parameters:**
- `$filters`: `['tierName' => 'Tier*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Supplier Return Reason** (Read-only)
```php
$api->supplierReturnReason->getAll($filters = [])    // Get all supplier return reasons
$api->supplierReturnReason->getById($guid)          // Get supplier return reason by GUID
```
**Parameters:**
- `$filters`: `['reasonName' => 'Reason*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Taxes** (Read-only)
```php
$api->taxes->getAll($filters = [])                  // Get all taxes
$api->taxes->getById($guid)                         // Get tax by GUID
```
**Parameters:**
- `$filters`: `['taxName' => 'Tax*', 'taxRate' => 0.15, 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Unit of Measures** (Read-only)
```php
$api->unitOfMeasures->getAll($filters = [])          // Get all unit of measures
$api->unitOfMeasures->getById($guid)                // Get unit of measure by GUID
```
**Parameters:**
- `$filters`: `['unitName' => 'Unit*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

#### **Warehouses** (Read-only)
```php
$api->warehouses->getAll($filters = [])              // Get all warehouses
$api->warehouses->getById($guid)                    // Get warehouse by GUID
```
**Parameters:**
- `$filters`: `['warehouseCode' => 'WH*', 'warehouseName' => 'Warehouse*', 'modifiedSince' => '2024-01-01', 'pageSize' => 50]`

## 📋 Filtering and Pagination

### Supported Filters

Most services support these common filters:

```php
// Date filtering
'modifiedSince' => '2024-01-01'
'createdSince' => '2024-01-01'
'asAtDate' => '2024-01-01'

// Code filtering
'customerCode' => 'CUST*'
'productCode' => 'PROD*'
'supplierCode' => 'SUPP*'

// Status filtering
'isObsolete' => false
'isActive' => true
'status' => 'Parked'

// Pagination
'pageSize' => 50
'pageNumber' => 1

// Ordering
'orderBy' => 'LastModifiedOn'
'orderDirection' => 'DESC'
```

### Example Usage

```php
// Get recent customers
$recentCustomers = $api->customers->getAll([
    'modifiedSince' => '2024-01-01',
    'pageSize' => 100,
    'orderBy' => 'LastModifiedOn',
    'orderDirection' => 'DESC'
]);

// Get active products
$activeProducts = $api->products->getAll([
    'isObsolete' => false,
    'isSellable' => true,
    'pageSize' => 50
]);
```

## 📖 Documentation References
- [Offical documentation](https://apidocs.unleashedsoftware.com/)
- [PHPUnit Documentation](https://docs.phpunit.de/en/12.4/)
- [Guzzle HTTP Client](https://docs.guzzlephp.org/)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Add tests for new functionality
4. Ensure all tests pass
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🆘 Support

For support and questions:

- Create an issue on GitHub
- Review the API documentation for endpoint details



**Built for the Unleashed Software community**
