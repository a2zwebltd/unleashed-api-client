<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\PurchaseOrder;

/**
 * Service class for managing PurchaseOrder operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with PurchaseOrder resources,
 * including CRUD operations, line management, and order processing workflows.
 * Purchase orders represent requests to suppliers for goods or services,
 * enabling procurement management and inventory control.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class PurchaseOrdersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new PurchaseOrdersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all purchase orders from the Unleashed API.
     *
     * This method fetches all available purchase orders from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'OrderNumber']
     *
     * @return PurchaseOrder[] An array of PurchaseOrder objects representing all purchase orders.
     *                         Returns an empty array if no purchase orders are found or if the API response
     *                         doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrdersService = new PurchaseOrdersService($client);
     *
     * // Get all purchase orders
     * $purchaseOrders = $purchaseOrdersService->getAll();
     *
     * // Get purchase orders with filters
     * $filteredPurchaseOrders = $purchaseOrdersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'OrderNumber'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/PurchaseOrders', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return PurchaseOrder::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific purchase order by its GUID.
     *
     * This method fetches a single purchase order from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the purchase order to retrieve
     *
     * @return PurchaseOrder|null The PurchaseOrder object if found, null if the purchase order doesn't exist
     *                           or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrder = $purchaseOrdersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($purchaseOrder) {
     *     echo "Purchase Order found: " . $purchaseOrder->getOrderNumber();
     *     echo "Supplier: " . $purchaseOrder->getSupplierName();
     *     echo "Total: " . $purchaseOrder->getTotal();
     * }
     * ```
     */
    public function getById(string $guid): ?PurchaseOrder
    {
        $response = $this->client->get("/PurchaseOrders/{$guid}");

        if (empty($response)) {
            return null;
        }

        return PurchaseOrder::fromArray($response);
    }


    /**
     * Creates a new purchase order in the Unleashed system.
     *
     * This method creates a new purchase order with the provided data. The data can be provided
     * either as an array or as a PurchaseOrder DTO object.
     *
     * @param array|PurchaseOrder $data The purchase order data to create. Can be an array of data
     *                                  or a PurchaseOrder DTO object
     *
     * @return PurchaseOrder The created PurchaseOrder object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create purchase order from array
     * $purchaseOrderData = [
     *     'Supplier' => ['Guid' => 'supplier-guid-here'],
     *     'OrderNumber' => 'PO-001',
     *     'OrderDate' => '2024-01-15',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 10,
     *             'UnitPrice' => 25.00
     *         ]
     *     ]
     * ];
     * $newPurchaseOrder = $purchaseOrdersService->create($purchaseOrderData);
     *
     * // Create purchase order from DTO
     * $purchaseOrder = new PurchaseOrder($purchaseOrderData);
     * $newPurchaseOrder = $purchaseOrdersService->create($purchaseOrder);
     * ```
     */
    public function create(array|PurchaseOrder $data): PurchaseOrder
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $purchaseorder = PurchaseOrder::fromArray($data);
        } else {
            $purchaseorder = $data;
        }

        $response = $this->client->post('/PurchaseOrders', $purchaseorder->toArray());


        return PurchaseOrder::fromArray($response);
    }

    /**
     * Updates an existing purchase order in the Unleashed system.
     *
     * This method updates an existing purchase order with the provided data. The data can be provided
     * either as an array or as a PurchaseOrder DTO object.
     *
     * @param string              $guid The unique identifier (GUID) of the purchase order to update
     * @param array|PurchaseOrder $data The updated purchase order data. Can be an array of data
     *                                  or a PurchaseOrder DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'OrderDate' => '2024-01-20',
     *     'Notes' => 'Updated purchase order'
     * ];
     * $response = $purchaseOrdersService->update($purchaseOrderGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|PurchaseOrder $data): array
    {

        // If array, create DTO from it
        if (is_array($data)) {
            $purchaseorder = PurchaseOrder::fromArray($data);
        } else {
            $purchaseorder = $data;
        }

        $response = $this->client->put("/PurchaseOrders/{$guid}", $purchaseorder->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a purchase order from the Unleashed system.
     *
     * This method permanently removes a purchase order from the Unleashed system.
     * Note: Deleting a purchase order may affect related inventory, supplier relationships, and financial records.
     *
     * @param string $guid The unique identifier (GUID) of the purchase order to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $purchaseOrdersService->delete($purchaseOrderGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/PurchaseOrders/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a purchase order line from a purchase order.
     *
     * This method removes a specific line item from an existing purchase order.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order containing the line
     * @param string $lineGuid  The unique identifier (GUID) of the purchase order line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $purchaseOrdersService->deleteLine($purchaseOrderGuid, $lineGuid);
     * ```
     */
    public function deleteLine(string $orderGuid, string $lineGuid): array
    {
        $response = $this->client->delete("/PurchaseOrders/{$orderGuid}/Lines/{$lineGuid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Retrieves costs for a specific purchase order.
     *
     * This method fetches cost information associated with a purchase order,
     * including line costs, taxes, and other financial details.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order to get costs for
     *
     * @return array An array of cost data for the specified purchase order
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $costs = $purchaseOrdersService->getCosts($purchaseOrderGuid);
     *
     * echo "Total Cost: " . $costs['TotalCost'];
     * echo "Tax Amount: " . $costs['TaxAmount'];
     * ```
     */
    public function getCosts(string $orderGuid): array
    {
        $response = $this->client->get("/PurchaseOrders/{$orderGuid}/Costs");

        return $response;
    }

    /**
     * Creates a new line for an existing purchase order.
     *
     * This method adds a new line item to an existing purchase order, allowing you to specify
     * the products, quantities, and prices to be ordered.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order to add a line to
     * @param array  $lineData  The purchase order line data containing product information,
     *                          quantities, prices, and other line-specific details
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineData = [
     *     'Product' => ['Guid' => 'product-guid-here'],
     *     'Quantity' => 5,
     *     'UnitPrice' => 15.00,
     *     'Description' => 'Additional product for order'
     * ];
     * $response = $purchaseOrdersService->createLine($purchaseOrderGuid, $lineData);
     * ```
     */
    public function createLine(string $orderGuid, array $lineData): array
    {
        $response = $this->client->post("/PurchaseOrders/{$orderGuid}/Lines", $lineData);

        return $response;
    }

    /**
     * Updates an existing purchase order line.
     *
     * This method modifies an existing line item within a purchase order,
     * allowing you to update quantities, prices, or other line properties.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order containing the line
     * @param string $lineGuid  The unique identifier (GUID) of the purchase order line to update
     * @param array  $lineData  The updated purchase order line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $updateData = [
     *     'Quantity' => 8,
     *     'UnitPrice' => 18.00,
     *     'Description' => 'Updated line item'
     * ];
     * $response = $purchaseOrdersService->updateLine($purchaseOrderGuid, $lineGuid, $updateData);
     * ```
     */
    public function updateLine(string $orderGuid, string $lineGuid, array $lineData): array
    {
        $response = $this->client->put("/PurchaseOrders/{$orderGuid}/Lines/{$lineGuid}", $lineData);

        return $response;
    }

    /**
     * Receipts a purchase order.
     *
     * This method marks a purchase order as received, typically updating inventory
     * levels and moving the order through the procurement workflow. Receipting
     * indicates that the goods have been physically received and can be processed.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order to receipt
     *
     * @return array The raw API response from the receipt operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $purchaseOrdersService->receipt($purchaseOrderGuid);
     * ```
     */
    public function receipt(string $orderGuid): array
    {
        $response = $this->client->post("/PurchaseOrders/{$orderGuid}/Receipt", []);

        return $response;
    }

    /**
     * Completes a purchase order.
     *
     * This method marks a purchase order as completed, finalizing the procurement
     * process and updating all related business processes. Completion typically
     * occurs after all goods have been received and processed.
     *
     * @param string $orderGuid The unique identifier (GUID) of the purchase order to complete
     *
     * @return array The raw API response from the complete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $purchaseOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $purchaseOrdersService->complete($purchaseOrderGuid);
     * ```
     */
    public function complete(string $orderGuid): array
    {
        $response = $this->client->post("/PurchaseOrders/{$orderGuid}/Complete", []);

        return $response;
    }
}
