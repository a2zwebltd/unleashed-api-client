<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\StockOnHand;

/**
 * Service class for managing StockOnHand operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with StockOnHand resources,
 * allowing retrieval of current inventory levels and stock positions. Stock on hand
 * represents the actual quantity of products available in inventory at any given time,
 * enabling real-time inventory tracking, availability checking, and stock management.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class StockOnHandService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new StockOnHandService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all stock on hand records from the Unleashed API.
     *
     * This method fetches all available stock on hand records from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ProductCode']
     *
     * @return StockOnHand[] An array of StockOnHand objects representing all stock on hand records.
     *                      Returns an empty array if no stock on hand records are found or if the API response
     *                      doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockOnHandService = new StockOnHandService($client);
     *
     * // Get all stock on hand records
     * $stockOnHand = $stockOnHandService->getAll();
     *
     * // Get stock on hand with filters
     * $filteredStockOnHand = $stockOnHandService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ProductCode'
     * ]);
     *
     * foreach ($stockOnHand as $stock) {
     *     echo "Product: " . $stock->getProductCode();
     *     echo "Quantity: " . $stock->getQuantity();
     *     echo "Warehouse: " . $stock->getWarehouseName();
     *     echo "Location: " . $stock->getLocation();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/StockOnHand', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return StockOnHand::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific stock on hand record by its GUID.
     *
     * This method fetches a single stock on hand record from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the stock on hand record to retrieve
     *
     * @return StockOnHand|null The StockOnHand object if found, null if the stock on hand record doesn't exist
     *                         or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockOnHand = $stockOnHandService->getById('12345678-1234-1234-1234-123456789012');
     * if ($stockOnHand) {
     *     echo "Stock On Hand found: " . $stockOnHand->getProductCode();
     *     echo "Quantity: " . $stockOnHand->getQuantity();
     *     echo "Warehouse: " . $stockOnHand->getWarehouseName();
     *     echo "Location: " . $stockOnHand->getLocation();
     *     echo "Last Updated: " . $stockOnHand->getLastUpdated();
     * }
     * ```
     */
    public function getById(string $guid): ?StockOnHand
    {
        $response = $this->client->get("/StockOnHand/{$guid}");

        if (empty($response)) {
            return null;
        }

        return StockOnHand::fromArray($response);
    }

    /**
     * Retrieves stock on hand records for a specific product across all warehouses.
     *
     * This method fetches stock on hand records for a given product from all warehouses
     * in the Unleashed system, providing a comprehensive view of inventory levels
     * across all locations.
     *
     * @param string $productGuid The unique identifier (GUID) of the product to get stock levels for
     *
     * @return StockOnHand[] An array of StockOnHand objects representing stock levels for the product
     *                      across all warehouses. Returns an empty array if no stock records are found
     *                      or if the API response doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGuid = '12345678-1234-1234-1234-123456789012';
     * $stockOnHand = $stockOnHandService->getAllWarehouses($productGuid);
     *
     * foreach ($stockOnHand as $stock) {
     *     echo "Product: " . $stock->getProductCode();
     *     echo "Warehouse: " . $stock->getWarehouseName();
     *     echo "Quantity: " . $stock->getQuantity();
     *     echo "Location: " . $stock->getLocation();
     * }
     *
     * // Calculate total stock across all warehouses
     * $totalStock = array_sum(array_map(fn($stock) => $stock->getQuantity(), $stockOnHand));
     * echo "Total stock across all warehouses: " . $totalStock;
     * ```
     */
    public function getAllWarehouses(string $productGuid): array
    {
        $response = $this->client->get("/StockOnHand/{$productGuid}/AllWarehouses");

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return StockOnHand::fromArray($item);
            },
            $response['Items']
        );
    }
}
