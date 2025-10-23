<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\SupplierReturn;
use Exception;

/**
 * Service class for managing SupplierReturn operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with SupplierReturn resources,
 * including CRUD operations, line management, cost tracking, and product tracking.
 * Supplier returns represent the process of returning goods to suppliers, enabling
 * proper handling of defective products, overstock, or other return scenarios.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SupplierReturnsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SupplierReturnsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all supplier returns from the Unleashed API.
     *
     * This method fetches all available supplier returns from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ReturnNumber']
     *
     * @return SupplierReturn[] An array of SupplierReturn objects representing all supplier returns.
     *                         Returns an empty array if no supplier returns are found or if the API response
     *                         doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplierReturnsService = new SupplierReturnsService($client);
     *
     * // Get all supplier returns
     * $supplierReturns = $supplierReturnsService->getAll();
     *
     * // Get supplier returns with filters
     * $filteredSupplierReturns = $supplierReturnsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ReturnNumber'
     * ]);
     *
     * foreach ($supplierReturns as $return) {
     *     echo "Return: " . $return->getReturnNumber();
     *     echo "Supplier: " . $return->getSupplierName();
     *     echo "Date: " . $return->getReturnDate();
     *     echo "Status: " . $return->getStatus();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SupplierReturns', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SupplierReturn::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific supplier return by its GUID.
     *
     * This method fetches a single supplier return from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the supplier return to retrieve
     *
     * @return SupplierReturn|null The SupplierReturn object if found, null if the supplier return doesn't exist
     *                            or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplierReturn = $supplierReturnsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($supplierReturn) {
     *     echo "Supplier Return found: " . $supplierReturn->getReturnNumber();
     *     echo "Supplier: " . $supplierReturn->getSupplierName();
     *     echo "Date: " . $supplierReturn->getReturnDate();
     *     echo "Status: " . $supplierReturn->getStatus();
     *     echo "Total Value: " . $supplierReturn->getTotalValue();
     * }
     * ```
     */
    public function getById(string $guid): ?SupplierReturn
    {
        $response = $this->client->get("/SupplierReturns/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SupplierReturn::fromArray($response);
    }

    /**
     * Creates a new supplier return in the Unleashed system.
     *
     * This method creates a new supplier return with the provided data. The data can be provided
     * either as an array or as a SupplierReturn DTO object.
     *
     * @param array|SupplierReturn $data The supplier return data to create. Can be an array of data
     *                                   or a SupplierReturn DTO object
     *
     * @return SupplierReturn The created SupplierReturn object. Note: The API returns an empty array
     *                       on successful creation, so the input data is returned as the created object.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create supplier return from array
     * $returnData = [
     *     'Supplier' => ['Guid' => 'supplier-guid-here'],
     *     'ReturnNumber' => 'SR-001',
     *     'ReturnDate' => '2024-01-15',
     *     'Reason' => 'Defective goods',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 5,
     *             'UnitCost' => 25.00
     *         ]
     *     ]
     * ];
     * $newSupplierReturn = $supplierReturnsService->create($returnData);
     *
     * // Create supplier return from DTO
     * $supplierReturn = new SupplierReturn($returnData);
     * $newSupplierReturn = $supplierReturnsService->create($supplierReturn);
     * ```
     */
    public function create(array|SupplierReturn $data): SupplierReturn
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $supplierreturn = SupplierReturn::fromArray($data);
        } else {
            $supplierreturn = $data;
        }

        $response = $this->client->post('/SupplierReturns', $supplierreturn->toArray());

        // Note: SupplierReturns API returns empty array on successful creation
        // Return the input data as the created object since API doesn't return it
        if (empty($response) || $response === []) {
            return $supplierreturn;
        }

        return SupplierReturn::fromArray($response);
    }

    /**
     * Updates an existing supplier return in the Unleashed system.
     *
     * This method updates an existing supplier return with the provided data. The method tries
     * POST first, then falls back to PUT if POST fails, ensuring compatibility with different
     * API endpoint configurations.
     *
     * @param string               $guid The unique identifier (GUID) of the supplier return to update
     * @param array|SupplierReturn $data The updated supplier return data. Can be an array of data
     *                                   or a SupplierReturn DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If both POST and PUT requests fail
     *
     * @example
     * ```php
     * $supplierReturnGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Reason' => 'Updated return reason',
     *     'Notes' => 'Additional notes about the return'
     * ];
     * $response = $supplierReturnsService->update($supplierReturnGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|SupplierReturn $data): array
    {
        if (empty($guid)) {
        }

        // Try POST first, then fallback to PUT if POST fails
        try {
            // Send raw array data directly to avoid DTO conversion issues
            if (is_array($data)) {
                $response = $this->client->post("/SupplierReturns/{$guid}", $data);
            } else {
                $supplierreturn = $data;
                $response = $this->client->post("/SupplierReturns/{$guid}", $supplierreturn->toArray());
            }
        } catch (Exception $e) {
            // If POST fails, try PUT as fallback
            if (is_array($data)) {
                $response = $this->client->put("/SupplierReturns/{$guid}", $data);
            } else {
                $supplierreturn = $data;
                $response = $this->client->put("/SupplierReturns/{$guid}", $supplierreturn->toArray());
            }
        }

        // For update operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a supplier return from the Unleashed system.
     *
     * This method permanently removes a supplier return from the Unleashed system.
     * Note: Deleting a supplier return may affect related inventory, costs, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the supplier return to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplierReturnGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $supplierReturnsService->delete($supplierReturnGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/SupplierReturns/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Completes a supplier return.
     *
     * This method marks a supplier return as completed, finalizing the return process
     * and updating all related business processes. Completion typically triggers
     * inventory adjustments, cost updates, and other downstream processes.
     *
     * @param string $guid The unique identifier (GUID) of the supplier return to complete
     *
     * @return array The raw API response from the complete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplierReturnGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $supplierReturnsService->complete($supplierReturnGuid);
     * ```
     */
    public function complete(string $guid): array
    {
        $response = $this->client->post("/SupplierReturns/{$guid}/Complete", []);
        return $response;
    }

    /**
     * Updates a cost line for a supplier return.
     *
     * This method updates cost information associated with a specific supplier return,
     * allowing you to track additional costs such as shipping, handling, or restocking fees.
     *
     * @param string $returnGuid   The unique identifier (GUID) of the supplier return
     * @param string $costLineGuid The unique identifier (GUID) of the cost line to update
     * @param array  $costData     The updated cost data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $costLineGuid = '87654321-4321-4321-4321-210987654321';
     * $costData = [
     *     'Amount' => 15.00,
     *     'Description' => 'Restocking fee'
     * ];
     * $response = $supplierReturnsService->updateCostLine($returnGuid, $costLineGuid, $costData);
     * ```
     */
    public function updateCostLine(string $returnGuid, string $costLineGuid, array $costData): array
    {
        $response = $this->client->put("/SupplierReturns/{$returnGuid}/Costs/{$costLineGuid}", $costData);
        return $response;
    }

    /**
     * Updates a line item for a supplier return.
     *
     * This method updates an existing line item within a supplier return,
     * allowing you to modify quantities, products, or other line properties.
     *
     * @param string $returnGuid The unique identifier (GUID) of the supplier return
     * @param string $lineGuid   The unique identifier (GUID) of the line to update
     * @param array  $lineData   The updated line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $lineData = [
     *     'Quantity' => 3,
     *     'UnitCost' => 30.00,
     *     'Reason' => 'Updated return reason'
     * ];
     * $response = $supplierReturnsService->updateLine($returnGuid, $lineGuid, $lineData);
     * ```
     */
    public function updateLine(string $returnGuid, string $lineGuid, array $lineData): array
    {
        $response = $this->client->put("/SupplierReturns/{$returnGuid}/Lines/{$lineGuid}", $lineData);
        return $response;
    }

    /**
     * Deletes a line item from a supplier return.
     *
     * This method removes a specific line item from an existing supplier return.
     *
     * @param string $returnGuid The unique identifier (GUID) of the supplier return
     * @param string $lineGuid   The unique identifier (GUID) of the line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $supplierReturnsService->deleteLine($returnGuid, $lineGuid);
     * ```
     */
    public function deleteLine(string $returnGuid, string $lineGuid): array
    {
        $response = $this->client->delete("/SupplierReturns/{$returnGuid}/Lines/{$lineGuid}");
        return $response;
    }

    /**
     * Deletes product tracking information for a supplier return.
     *
     * This method removes all product tracking information associated with a supplier return.
     *
     * @param string $returnGuid The unique identifier (GUID) of the supplier return
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $supplierReturnsService->deleteProductTracking($returnGuid);
     * ```
     */
    public function deleteProductTracking(string $returnGuid): array
    {
        $response = $this->client->delete("/SupplierReturns/{$returnGuid}/ProductTracking");
        return $response;
    }

    /**
     * Appends product tracking information to a supplier return.
     *
     * This method adds new product tracking information to an existing supplier return,
     * allowing you to track serial numbers, batch numbers, or other product identifiers.
     *
     * @param string $returnGuid   The unique identifier (GUID) of the supplier return
     * @param array  $trackingData The product tracking data to append
     *
     * @return array The raw API response from the append operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $trackingData = [
     *     'SerialNumber' => 'SN123456789',
     *     'BatchNumber' => 'BATCH001',
     *     'ExpiryDate' => '2025-12-31'
     * ];
     * $response = $supplierReturnsService->appendProductTracking($returnGuid, $trackingData);
     * ```
     */
    public function appendProductTracking(string $returnGuid, array $trackingData): array
    {
        $response = $this->client->post("/SupplierReturns/{$returnGuid}/ProductTracking", $trackingData);
        return $response;
    }

    /**
     * Updates product tracking information for a supplier return.
     *
     * This method updates existing product tracking information for a supplier return,
     * allowing you to modify serial numbers, batch numbers, or other tracking details.
     *
     * @param string $returnGuid   The unique identifier (GUID) of the supplier return
     * @param array  $trackingData The updated product tracking data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $returnGuid = '12345678-1234-1234-1234-123456789012';
     * $trackingData = [
     *     'SerialNumber' => 'SN987654321',
     *     'BatchNumber' => 'BATCH002',
     *     'ExpiryDate' => '2026-01-31'
     * ];
     * $response = $supplierReturnsService->updateProductTracking($returnGuid, $trackingData);
     * ```
     */
    public function updateProductTracking(string $returnGuid, array $trackingData): array
    {
        $response = $this->client->put("/SupplierReturns/{$returnGuid}/ProductTracking", $trackingData);
        return $response;
    }
}
