<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\StockAdjustment;

/**
 * Service class for managing StockAdjustment operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with StockAdjustment resources,
 * including CRUD operations for managing inventory adjustments. Stock adjustments represent
 * changes to inventory levels that occur outside of normal sales and purchase transactions,
 * such as physical stock counts, damage write-offs, transfers, or corrections.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class StockAdjustmentsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new StockAdjustmentsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all stock adjustments from the Unleashed API.
     *
     * This method fetches all available stock adjustments from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'AdjustmentDate']
     *
     * @return StockAdjustment[] An array of StockAdjustment objects representing all stock adjustments.
     *                          Returns an empty array if no stock adjustments are found or if the API response
     *                          doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockAdjustmentsService = new StockAdjustmentsService($client);
     *
     * // Get all stock adjustments
     * $stockAdjustments = $stockAdjustmentsService->getAll();
     *
     * // Get stock adjustments with filters
     * $filteredStockAdjustments = $stockAdjustmentsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'AdjustmentDate'
     * ]);
     *
     * foreach ($stockAdjustments as $adjustment) {
     *     echo "Adjustment: " . $adjustment->getAdjustmentNumber();
     *     echo "Date: " . $adjustment->getAdjustmentDate();
     *     echo "Reason: " . $adjustment->getReason();
     *     echo "Status: " . $adjustment->getStatus();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/StockAdjustments', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return StockAdjustment::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific stock adjustment by its GUID.
     *
     * This method fetches a single stock adjustment from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the stock adjustment to retrieve
     *
     * @return StockAdjustment|null The StockAdjustment object if found, null if the stock adjustment doesn't exist
     *                             or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockAdjustment = $stockAdjustmentsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($stockAdjustment) {
     *     echo "Stock Adjustment found: " . $stockAdjustment->getAdjustmentNumber();
     *     echo "Date: " . $stockAdjustment->getAdjustmentDate();
     *     echo "Reason: " . $stockAdjustment->getReason();
     *     echo "Status: " . $stockAdjustment->getStatus();
     *     echo "Total Value: " . $stockAdjustment->getTotalValue();
     * }
     * ```
     */
    public function getById(string $guid): ?StockAdjustment
    {
        $response = $this->client->get("/StockAdjustments/{$guid}");

        if (empty($response)) {
            return null;
        }

        return StockAdjustment::fromArray($response);
    }

    /**
     * Creates a new stock adjustment in the Unleashed system.
     *
     * This method creates a new stock adjustment with the provided data. The data can be provided
     * either as an array or as a StockAdjustment DTO object.
     *
     * @param array|StockAdjustment $data The stock adjustment data to create. Can be an array of data
     *                                    or a StockAdjustment DTO object
     *
     * @return StockAdjustment The created StockAdjustment object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create stock adjustment from array
     * $adjustmentData = [
     *     'AdjustmentDate' => '2024-01-15',
     *     'Reason' => 'Physical Stock Count',
     *     'Notes' => 'Year-end inventory count',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 10,
     *             'UnitCost' => 25.00
     *         ]
     *     ]
     * ];
     * $newStockAdjustment = $stockAdjustmentsService->create($adjustmentData);
     *
     * // Create stock adjustment from DTO
     * $stockAdjustment = new StockAdjustment($adjustmentData);
     * $newStockAdjustment = $stockAdjustmentsService->create($stockAdjustment);
     * ```
     */
    public function create(array|StockAdjustment $data): StockAdjustment
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $stockadjustment = StockAdjustment::fromArray($data);
        } else {
            $stockadjustment = $data;
        }

        $response = $this->client->post('/StockAdjustments', $stockadjustment->toArray());

        if (empty($response)) {
        }

        return StockAdjustment::fromArray($response);
    }

    /**
     * Updates an existing stock adjustment in the Unleashed system.
     *
     * This method updates an existing stock adjustment with the provided data. The data can be provided
     * either as an array or as a StockAdjustment DTO object.
     *
     * @param string                $guid The unique identifier (GUID) of the stock adjustment to update
     * @param array|StockAdjustment $data The updated stock adjustment data. Can be an array of data
     *                                    or a StockAdjustment DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $stockAdjustmentGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Reason' => 'Updated reason for adjustment',
     *     'Notes' => 'Additional notes about the adjustment'
     * ];
     * $response = $stockAdjustmentsService->update($stockAdjustmentGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|StockAdjustment $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $stockadjustment = StockAdjustment::fromArray($data);
        } else {
            $stockadjustment = $data;
        }

        $response = $this->client->put("/StockAdjustments/{$guid}", $stockadjustment->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a stock adjustment from the Unleashed system.
     *
     * This method permanently removes a stock adjustment from the Unleashed system.
     * Note: Deleting a stock adjustment may affect inventory levels, cost calculations, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the stock adjustment to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockAdjustmentGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $stockAdjustmentsService->delete($stockAdjustmentGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/StockAdjustments/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
