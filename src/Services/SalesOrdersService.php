<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\SalesOrder;

/**
 * Service class for managing SalesOrder operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with SalesOrder resources,
 * including CRUD operations, line management, and order processing workflows.
 * Sales orders represent customer requests for goods or services, enabling
 * the complete sales process from order creation to fulfillment.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalesOrdersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalesOrdersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sales orders from the Unleashed API.
     *
     * This method fetches all available sales orders from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'OrderNumber']
     *
     * @return SalesOrder[] An array of SalesOrder objects representing all sales orders.
     *                      Returns an empty array if no sales orders are found or if the API response
     *                      doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrdersService = new SalesOrdersService($client);
     *
     * // Get all sales orders
     * $salesOrders = $salesOrdersService->getAll();
     *
     * // Get sales orders with filters
     * $filteredSalesOrders = $salesOrdersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'OrderNumber'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SalesOrders', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SalesOrder::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific sales order by its GUID.
     *
     * This method fetches a single sales order from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the sales order to retrieve
     *
     * @return SalesOrder|null The SalesOrder object if found, null if the sales order doesn't exist
     *                         or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrder = $salesOrdersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($salesOrder) {
     *     echo "Sales Order found: " . $salesOrder->getOrderNumber();
     *     echo "Customer: " . $salesOrder->getCustomerName();
     *     echo "Total: " . $salesOrder->getTotal();
     * }
     * ```
     */
    public function getById(string $guid): ?SalesOrder
    {
        $response = $this->client->get("/SalesOrders/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SalesOrder::fromArray($response);
    }


    /**
     * Creates a new sales order in the Unleashed system.
     *
     * This method creates a new sales order with the provided data. The data can be provided
     * either as an array or as a SalesOrder DTO object.
     *
     * @param array|SalesOrder $data The sales order data to create. Can be an array of data
     *                               or a SalesOrder DTO object
     *
     * @return SalesOrder The created SalesOrder object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create sales order from array
     * $salesOrderData = [
     *     'Customer' => ['Guid' => 'customer-guid-here'],
     *     'OrderNumber' => 'SO-001',
     *     'OrderDate' => '2024-01-15',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 5,
     *             'UnitPrice' => 25.00
     *         ]
     *     ]
     * ];
     * $newSalesOrder = $salesOrdersService->create($salesOrderData);
     *
     * // Create sales order from DTO
     * $salesOrder = new SalesOrder($salesOrderData);
     * $newSalesOrder = $salesOrdersService->create($salesOrder);
     * ```
     */
    public function create(array|SalesOrder $data): SalesOrder
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $salesOrder = SalesOrder::fromArray($data);
        } else {
            $salesOrder = $data;
        }

        $response = $this->client->post('/SalesOrders', $salesOrder->toArray());


        return SalesOrder::fromArray($response);
    }

    /**
     * Updates an existing sales order in the Unleashed system.
     *
     * This method updates an existing sales order with the provided data. The data can be provided
     * either as an array or as a SalesOrder DTO object. For complex nested objects, array data
     * is sent directly to the API without DTO conversion to avoid potential issues.
     *
     * @param string           $guid The unique identifier (GUID) of the sales order to update
     * @param array|SalesOrder $data The updated sales order data. Can be an array of data
     *                               or a SalesOrder DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'OrderDate' => '2024-01-20',
     *     'Notes' => 'Updated sales order'
     * ];
     * $response = $salesOrdersService->update($salesOrderGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|SalesOrder $data): array
    {
        // If array, send directly to API (no DTO conversion for complex nested objects)
        if (is_array($data)) {
            $response = $this->client->put("/SalesOrders/{$guid}", $data);
        } else {
            $salesOrder = $data;
            $response = $this->client->put("/SalesOrders/{$guid}", $salesOrder->toArray());
        }

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a sales order from the Unleashed system.
     *
     * This method permanently removes a sales order from the Unleashed system.
     * Note: Deleting a sales order may affect related invoices, inventory, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the sales order to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $salesOrdersService->delete($salesOrderGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/SalesOrders/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a sales order line from a sales order.
     *
     * This method removes a specific line item from an existing sales order.
     *
     * @param string $orderGuid The unique identifier (GUID) of the sales order containing the line
     * @param string $lineGuid  The unique identifier (GUID) of the sales order line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $salesOrdersService->deleteLine($salesOrderGuid, $lineGuid);
     * ```
     */
    public function deleteLine(string $orderGuid, string $lineGuid): array
    {
        $response = $this->client->delete("/SalesOrders/{$orderGuid}/SalesOrderLine/{$lineGuid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Creates a new line for an existing sales order.
     *
     * This method adds a new line item to an existing sales order, allowing you to specify
     * the products, quantities, and prices to be ordered.
     *
     * @param string $orderGuid The unique identifier (GUID) of the sales order to add a line to
     * @param array  $lineData  The sales order line data containing product information,
     *                          quantities, prices, and other line-specific details
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineData = [
     *     'Product' => ['Guid' => 'product-guid-here'],
     *     'Quantity' => 3,
     *     'UnitPrice' => 15.00,
     *     'Description' => 'Additional product for order'
     * ];
     * $response = $salesOrdersService->createLine($salesOrderGuid, $lineData);
     * ```
     */
    public function createLine(string $orderGuid, array $lineData): array
    {
        $response = $this->client->post("/SalesOrders/{$orderGuid}/Lines", $lineData);

        // For POST operations, return raw response
        return $response;
    }

    /**
     * Updates an existing sales order line.
     *
     * This method modifies an existing line item within a sales order,
     * allowing you to update quantities, prices, or other line properties.
     *
     * @param string $orderGuid The unique identifier (GUID) of the sales order containing the line
     * @param string $lineGuid  The unique identifier (GUID) of the sales order line to update
     * @param array  $lineData  The updated sales order line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $updateData = [
     *     'Quantity' => 5,
     *     'UnitPrice' => 18.00,
     *     'Description' => 'Updated line item'
     * ];
     * $response = $salesOrdersService->updateLine($salesOrderGuid, $lineGuid, $updateData);
     * ```
     */
    public function updateLine(string $orderGuid, string $lineGuid, array $lineData): array
    {
        $response = $this->client->put("/SalesOrders/{$orderGuid}/Lines/{$lineGuid}", $lineData);

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Completes a sales order.
     *
     * This method marks a sales order as completed, finalizing the sales process
     * and updating all related business processes. Completion typically triggers
     * inventory allocation, fulfillment workflows, and other downstream processes.
     *
     * @param string $orderGuid The unique identifier (GUID) of the sales order to complete
     *
     * @return bool True if the sales order was successfully completed, false if an error occurred
     *
     * @example
     * ```php
     * $salesOrderGuid = '12345678-1234-1234-1234-123456789012';
     * $success = $salesOrdersService->complete($salesOrderGuid);
     * if ($success) {
     *     echo "Sales order completed successfully";
     * } else {
     *     echo "Failed to complete sales order";
     * }
     * ```
     */
    public function complete(string $orderGuid): bool
    {
        try {
            $response = $this->client->post("/SalesOrders/{$orderGuid}/Complete", []);

            // Return true if no exception is thrown (assuming success)
            return true;
        } catch (\Exception $e) {
            // Log the error but don't throw it
            error_log("Complete Sales Order Error: " . $e->getMessage());
            return false;
        }
    }
}
