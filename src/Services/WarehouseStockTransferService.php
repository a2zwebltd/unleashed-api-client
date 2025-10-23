<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\WarehouseStockTransfer;

/**
 * Service class for managing WarehouseStockTransfer operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with WarehouseStockTransfer resources,
 * including CRUD operations, line management, and transfer completion. Warehouse stock transfers
 * represent the movement of inventory between different warehouse locations, enabling proper
 * inventory redistribution, multi-warehouse management, and stock optimization.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class WarehouseStockTransferService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new WarehouseStockTransferService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all warehouse stock transfers from the Unleashed API.
     *
     * This method fetches all available warehouse stock transfers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'TransferDate']
     *
     * @return WarehouseStockTransfer[] An array of WarehouseStockTransfer objects representing all transfers.
     *                                 Returns an empty array if no transfers are found or if the API response
     *                                 doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $warehouseStockTransferService = new WarehouseStockTransferService($client);
     *
     * // Get all warehouse stock transfers
     * $transfers = $warehouseStockTransferService->getAll();
     *
     * // Get transfers with filters
     * $filteredTransfers = $warehouseStockTransferService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'TransferDate'
     * ]);
     *
     * foreach ($transfers as $transfer) {
     *     echo "Transfer: " . $transfer->getTransferNumber();
     *     echo "From Warehouse: " . $transfer->getFromWarehouseName();
     *     echo "To Warehouse: " . $transfer->getToWarehouseName();
     *     echo "Status: " . $transfer->getStatus();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/WarehouseStockTransfers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return WarehouseStockTransfer::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific warehouse stock transfer by its GUID.
     *
     * This method fetches a single warehouse stock transfer from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the warehouse stock transfer to retrieve
     *
     * @return WarehouseStockTransfer|null The WarehouseStockTransfer object if found, null if the transfer
     *                                   doesn't exist or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transfer = $warehouseStockTransferService->getById('12345678-1234-1234-1234-123456789012');
     * if ($transfer) {
     *     echo "Transfer found: " . $transfer->getTransferNumber();
     *     echo "From Warehouse: " . $transfer->getFromWarehouseName();
     *     echo "To Warehouse: " . $transfer->getToWarehouseName();
     *     echo "Date: " . $transfer->getTransferDate();
     *     echo "Status: " . $transfer->getStatus();
     * }
     * ```
     */
    public function getById(string $guid): ?WarehouseStockTransfer
    {
        $response = $this->client->get("/WarehouseStockTransfers/{$guid}");

        if (empty($response)) {
            return null;
        }

        return WarehouseStockTransfer::fromArray($response);
    }

    /**
     * Creates a new warehouse stock transfer in the Unleashed system.
     *
     * This method creates a new warehouse stock transfer with the provided data. The data can be provided
     * either as an array or as a WarehouseStockTransfer DTO object.
     *
     * @param array|WarehouseStockTransfer $data The warehouse stock transfer data to create. Can be an array of data
     *                                           or a WarehouseStockTransfer DTO object
     *
     * @return WarehouseStockTransfer The created WarehouseStockTransfer object with all fields populated
     *                                 from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create warehouse stock transfer from array
     * $transferData = [
     *     'FromWarehouse' => ['Guid' => 'from-warehouse-guid-here'],
     *     'ToWarehouse' => ['Guid' => 'to-warehouse-guid-here'],
     *     'TransferDate' => '2024-01-15',
     *     'Notes' => 'Stock redistribution',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 10
     *         ]
     *     ]
     * ];
     * $newTransfer = $warehouseStockTransferService->create($transferData);
     *
     * // Create transfer from DTO
     * $transfer = new WarehouseStockTransfer($transferData);
     * $newTransfer = $warehouseStockTransferService->create($transfer);
     * ```
     */
    public function create(array|WarehouseStockTransfer $data): WarehouseStockTransfer
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $warehousestocktransfer = WarehouseStockTransfer::fromArray($data);
        } else {
            $warehousestocktransfer = $data;
        }

        $response = $this->client->post('/WarehouseStockTransfers', $warehousestocktransfer->toArray());

        if (empty($response)) {
        }

        return WarehouseStockTransfer::fromArray($response);
    }

    /**
     * Updates an existing warehouse stock transfer in the Unleashed system.
     *
     * This method updates an existing warehouse stock transfer with the provided data. The data can be provided
     * either as an array or as a WarehouseStockTransfer DTO object.
     *
     * @param string                       $guid The unique identifier (GUID) of the warehouse stock transfer to update
     * @param array|WarehouseStockTransfer $data The updated warehouse stock transfer data. Can be an array of data
     *                                           or a WarehouseStockTransfer DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Notes' => 'Updated transfer notes',
     *     'TransferDate' => '2024-01-20'
     * ];
     * $response = $warehouseStockTransferService->update($transferGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|WarehouseStockTransfer $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $warehousestocktransfer = WarehouseStockTransfer::fromArray($data);
        } else {
            $warehousestocktransfer = $data;
        }

        $response = $this->client->put("/WarehouseStockTransfers/{$guid}", $warehousestocktransfer->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a warehouse stock transfer from the Unleashed system.
     *
     * This method permanently removes a warehouse stock transfer from the Unleashed system.
     * Note: Deleting a warehouse stock transfer may affect inventory levels and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the warehouse stock transfer to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $warehouseStockTransferService->delete($transferGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/WarehouseStockTransfers/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Creates a new line for a warehouse stock transfer.
     *
     * This method adds a new line item to an existing warehouse stock transfer,
     * allowing you to specify the products and quantities to be transferred.
     *
     * @param string $transferGuid The unique identifier (GUID) of the warehouse stock transfer
     * @param array  $lineData     The transfer line data containing product information and quantities
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $lineData = [
     *     'Product' => ['Guid' => 'product-guid-here'],
     *     'Quantity' => 5,
     *     'Notes' => 'Additional product for transfer'
     * ];
     * $response = $warehouseStockTransferService->createLine($transferGuid, $lineData);
     * ```
     */
    public function createLine(string $transferGuid, array $lineData): array
    {
        $response = $this->client->post("/WarehouseStockTransfers/{$transferGuid}/Lines", $lineData);
        return $response;
    }

    /**
     * Updates an existing line item for a warehouse stock transfer.
     *
     * This method updates an existing line item within a warehouse stock transfer,
     * allowing you to modify quantities, products, or other line properties.
     *
     * @param string $transferGuid The unique identifier (GUID) of the warehouse stock transfer
     * @param string $lineGuid     The unique identifier (GUID) of the line to update
     * @param array  $lineData     The updated line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $lineData = [
     *     'Quantity' => 8,
     *     'Notes' => 'Updated quantity for transfer'
     * ];
     * $response = $warehouseStockTransferService->updateLine($transferGuid, $lineGuid, $lineData);
     * ```
     */
    public function updateLine(string $transferGuid, string $lineGuid, array $lineData): array
    {
        $response = $this->client->put("/WarehouseStockTransfers/{$transferGuid}/Lines/{$lineGuid}", $lineData);
        return $response;
    }

    /**
     * Deletes a line item from a warehouse stock transfer.
     *
     * This method removes a specific line item from an existing warehouse stock transfer.
     *
     * @param string $transferGuid The unique identifier (GUID) of the warehouse stock transfer
     * @param string $lineGuid     The unique identifier (GUID) of the line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $warehouseStockTransferService->deleteLine($transferGuid, $lineGuid);
     * ```
     */
    public function deleteLine(string $transferGuid, string $lineGuid): array
    {
        $response = $this->client->delete("/WarehouseStockTransfers/{$transferGuid}/Lines/{$lineGuid}");
        return $response;
    }

    /**
     * Completes a warehouse stock transfer.
     *
     * This method marks a warehouse stock transfer as completed, finalizing the transfer process
     * and updating inventory levels in both source and destination warehouses. Completion typically
     * triggers inventory adjustments and other downstream processes.
     *
     * @param string $transferGuid The unique identifier (GUID) of the warehouse stock transfer to complete
     *
     * @return array The raw API response from the complete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $transferGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $warehouseStockTransferService->complete($transferGuid);
     * ```
     */
    public function complete(string $transferGuid): array
    {
        $response = $this->client->post("/WarehouseStockTransfers/{$transferGuid}/Complete", []);
        return $response;
    }
}
