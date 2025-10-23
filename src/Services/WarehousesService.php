<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing Warehouse operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with Warehouse resources,
 * allowing retrieval of warehouse information. Warehouses represent physical
 * storage locations where inventory is held, enabling proper inventory management,
 * location tracking, and multi-warehouse operations for businesses.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class WarehousesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new WarehousesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all warehouses from the Unleashed API.
     *
     * This method fetches all available warehouses from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'WarehouseName']
     *
     * @return array An array of warehouse data representing all warehouses.
     *               Returns an empty array if no warehouses are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $warehousesService = new WarehousesService($client);
     *
     * // Get all warehouses
     * $warehouses = $warehousesService->getAll();
     *
     * // Get warehouses with filters
     * $filteredWarehouses = $warehousesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'WarehouseName'
     * ]);
     *
     * foreach ($warehouses as $warehouse) {
     *     echo "Warehouse: " . $warehouse['WarehouseName'];
     *     echo "Code: " . $warehouse['WarehouseCode'];
     *     echo "Address: " . $warehouse['Address'];
     *     echo "Is Active: " . ($warehouse['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Warehouses', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific warehouse by its GUID.
     *
     * This method fetches a single warehouse from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the warehouse to retrieve
     *
     * @return array|null The warehouse data if found, null if the warehouse doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $warehouse = $warehousesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($warehouse) {
     *     echo "Warehouse found: " . $warehouse['WarehouseName'];
     *     echo "Code: " . $warehouse['WarehouseCode'];
     *     echo "Address: " . $warehouse['Address'];
     *     echo "City: " . $warehouse['City'];
     *     echo "Country: " . $warehouse['Country'];
     *     echo "Is Active: " . ($warehouse['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/Warehouses/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
