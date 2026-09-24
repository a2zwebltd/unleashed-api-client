# Unleashed API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/a2zwebltd/unleashed-api-client.svg)](https://packagist.org/packages/a2zwebltd/unleashed-api-client)
[![License](https://img.shields.io/packagist/l/a2zwebltd/unleashed-api-client.svg)](LICENSE)

A framework-agnostic PHP client for the [Unleashed Software](https://www.unleashedsoftware.com/) inventory management API. It signs every request for you (HMAC-SHA256 `api-auth-signature`), maps responses onto typed DTOs, and exposes each API resource as a service on a single entry point.

Official API documentation: [apidocs.unleashedsoftware.com](https://apidocs.unleashedsoftware.com/)

## Requirements

- PHP 8.4+
- Guzzle 7

## Installation

```bash
composer require a2zwebltd/unleashed-api-client
```

## Configuration

```php
use Unleashed\ApiClient\UnleashedApi;

$api = new UnleashedApi(
    'your-api-id',
    'your-api-key',
    'your-account/your-app',              // client-type header
    'https://api.unleashedsoftware.com'   // optional base URL
);
```

## Quick start

```php
use Unleashed\ApiClient\DTO\EditableResources\Customer;

// List customers (returns Customer[] DTOs)
$customers = $api->customers->getAll();

// Fetch one customer by GUID (returns ?Customer)
$customer = $api->customers->getById('customer-guid');

// Create a customer from a DTO...
$newCustomer = new Customer();
$newCustomer->setCustomerCode('CUST001');
$newCustomer->setCustomerName('John Doe');
$newCustomer->setEmail('john@example.com');
$created = $api->customers->create($newCustomer);

// ...or from an array in Unleashed field format
$created = $api->customers->create([
    'CustomerCode' => 'CUST002',
    'CustomerName' => 'Jane Doe',
]);

// Update takes the GUID plus a DTO or array
$customer->setPhoneNumber('+1234567890');
$api->customers->update($customer->getGuid(), $customer);

// Delete
$api->customers->delete($customer->getGuid());
```

### Filtering and pagination

`getAll()` passes the `$filters` array straight through as query parameters to the matching Unleashed endpoint, so any filter the API documents for that resource works here:

```php
$customers = $api->customers->getAll([
    'customerCode'  => 'CUST001',
    'modifiedSince' => '2024-01-01',
    'pageSize'      => 100,
]);
```

Check the [official documentation](https://apidocs.unleashedsoftware.com/) for the filters each endpoint accepts.

### Errors

Failed requests throw `Unleashed\ApiClient\Exceptions\ApiException`. A 401 throws `Unleashed\ApiClient\Exceptions\AuthenticationException`.

### Custom requests

For endpoints not covered by a service, use the signed HTTP client directly:

```php
$client = $api->getClient();
$response = $client->get('/SomeEndpoint', ['pageSize' => 10]);
```

## Services

Access every service as a property on `UnleashedApi`. `$filters` is always optional.

| Property | Methods |
| --- | --- |
| `accounts` | `getAll($filters)` |
| `assemblies` | `getAll`, `getById($guid)`, `create($data)`, `update($guid, $data)`, `delete($guid)`, `createAssemblyLine($guid, $line)`, `updateAssemblyLine($guid, $lineGuid, $line)`, `deleteAssemblyLine($guid, $lineGuid)`, `completeAssembly($guid)` |
| `attributeSets` | `getAll`, `getById`, `create`, `update`, `delete` |
| `batchNumbers` | `getAll`, `getById` |
| `billOfMaterials` | `getAll`, `getById`, `create`, `update`, `delete` |
| `companies` | `getAll` |
| `creditNotes` | `getAll`, `getById`, `create`, `update`, `delete`, `createCreditLine($guid, $line)`, `updateCreditLine($guid, $lineGuid, $line)`, `deleteCreditLine($guid, $lineGuid)`, `completeCreditNote($guid)` |
| `currencies` | `getAll`, `getById` |
| `customerDeliveryAddress` | `getAll` |
| `customerTypes` | `getAll`, `getById` |
| `customers` | `getAll`, `getById`, `create`, `update`, `delete`, `updatePost($guid, $data)`, `getContacts($guid)`, `createContact($guid, $contact)`, `updateContact($guid, $contactGuid, $contact)`, `deleteContact($guid, $contactGuid)` |
| `deliveryMethods` | `getAll` |
| `paymentTerms` | `getAll`, `getById` |
| `productBrands` | `getAll`, `getById` |
| `productGroups` | `getAll`, `getById` |
| `productPrices` | `getAll`, `getById` |
| `products` | `getAll`, `getById`, `create`, `update`, `delete`, `updatePost($guid, $data)`, `obsolete($guid)` |
| `purchaseOrders` | `getAll`, `getById`, `create`, `update`, `delete`, `getCosts($guid)`, `createLine($guid, $line)`, `updateLine($guid, $lineGuid, $line)`, `deleteLine($guid, $lineGuid)`, `receipt($guid)`, `complete($guid)` |
| `recostAdjustment` | `getAll` |
| `salesInvoices` | `getAll`, `getById` |
| `salesOrderGroup` | `getAll` |
| `salesOrders` | `getAll`, `getById`, `create`, `update`, `delete`, `createLine($guid, $line)`, `updateLine($guid, $lineGuid, $line)`, `deleteLine($guid, $lineGuid)`, `complete($guid)` |
| `salespersons` | `getAll`, `getById`, `create`, `update`, `delete` |
| `salesQuotes` | `getAll`, `getById` |
| `salesShipments` | `getAll`, `getById`, `create`, `update`, `delete` |
| `sellPriceTier` | `getAll` |
| `serialNumbers` | `getAll`, `getById` |
| `shippingCompanies` | `getAll`, `getById` |
| `stockAdjustments` | `getAll`, `getById`, `create`, `update`, `delete` |
| `stockCounts` | `getAll`, `getById` |
| `stockOnHand` | `getAll`, `getById`, `getAllWarehouses($productGuid)` |
| `supplierReturnReason` | `getAll` |
| `supplierReturns` | `getAll`, `getById`, `create`, `update`, `delete`, `complete($guid)`, `updateLine($guid, $lineGuid, $line)`, `deleteLine($guid, $lineGuid)`, `updateCostLine($guid, $costLineGuid, $cost)`, `appendProductTracking($guid, $data)`, `updateProductTracking($guid, $data)`, `deleteProductTracking($guid)` |
| `suppliers` | `getAll`, `getById` |
| `taxes` | `getAll`, `getById` |
| `unitOfMeasures` | `getAll`, `getById` |
| `warehouses` | `getAll`, `getById` |
| `warehouseStockTransfer` | `getAll`, `getById`, `create`, `update`, `delete`, `createLine($guid, $line)`, `updateLine($guid, $lineGuid, $line)`, `deleteLine($guid, $lineGuid)`, `complete($guid)` |

`create()` and `update()` accept either the resource DTO (from `Unleashed\ApiClient\DTO\EditableResources`) or an array in Unleashed field format. `create()` returns the created DTO; `update()` and `delete()` return the raw API response array. `getById()` returns a DTO (or an array for simple lookup resources) and `null` when nothing is found.

## Testing

```bash
composer test       # PHPUnit
composer cs-check   # PHP_CodeSniffer (PSR-12)
composer phpstan    # PHPStan
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md).

## Contributing

1. Fork the repository
2. Create a feature branch
3. Add tests for new functionality
4. Make sure `composer test` and `composer cs-check` pass
5. Open a pull request

## License

MIT. See [LICENSE](LICENSE).

## Support

Open an issue at [github.com/a2zwebltd/unleashed-api-client/issues](https://github.com/a2zwebltd/unleashed-api-client/issues).
