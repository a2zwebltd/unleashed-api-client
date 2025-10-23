<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\StockCount;

/**
 * Service class for managing StockCount operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with StockCount resources,
 * allowing retrieval of stock count information. Stock counts represent physical
 * inventory counts performed to verify and reconcile actual stock levels against
 * system records, enabling accurate inventory management and audit trails.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class StockCountsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new StockCountsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all stock counts from the Unleashed API.
     *
     * This method fetches all available stock counts from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CountDate']
     *
     * @return StockCount[] An array of StockCount objects representing all stock counts.
     *                     Returns an empty array if no stock counts are found or if the API response
     *                     doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockCountsService = new StockCountsService($client);
     *
     * // Get all stock counts
     * $stockCounts = $stockCountsService->getAll();
     *
     * // Get stock counts with filters
     * $filteredStockCounts = $stockCountsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CountDate'
     * ]);
     *
     * foreach ($stockCounts as $count) {
     *     echo "Count: " . $count->getCountNumber();
     *     echo "Date: " . $count->getCountDate();
     *     echo "Status: " . $count->getStatus();
     *     echo "Location: " . $count->getLocation();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/StockCounts', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return StockCount::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific stock count by its GUID.
     *
     * This method fetches a single stock count from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the stock count to retrieve
     *
     * @return StockCount|null The StockCount object if found, null if the stock count doesn't exist
     *                        or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $stockCount = $stockCountsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($stockCount) {
     *     echo "Stock Count found: " . $stockCount->getCountNumber();
     *     echo "Date: " . $stockCount->getCountDate();
     *     echo "Status: " . $stockCount->getStatus();
     *     echo "Location: " . $stockCount->getLocation();
     *     echo "Counted By: " . $stockCount->getCountedBy();
     * }
     * ```
     */
    public function getById(string $guid): ?StockCount
    {
        $response = $this->client->get("/StockCounts/{$guid}");

        if (empty($response)) {
            return null;
        }

        return StockCount::fromArray($response);
    }
}
