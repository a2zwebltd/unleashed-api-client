<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing ProductGroup operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with ProductGroup resources,
 * allowing retrieval of product group information. Product groups are used to
 * categorize and organize products into logical hierarchies, enabling better
 * product management, navigation, and reporting based on product categories.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class ProductGroupsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new ProductGroupsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all product groups from the Unleashed API.
     *
     * This method fetches all available product groups from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'GroupCode']
     *
     * @return array An array of product group data representing all product groups.
     *               Returns an empty array if no product groups are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGroupsService = new ProductGroupsService($client);
     *
     * // Get all product groups
     * $productGroups = $productGroupsService->getAll();
     *
     * // Get product groups with filters
     * $filteredProductGroups = $productGroupsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'GroupCode'
     * ]);
     *
     * foreach ($productGroups as $productGroup) {
     *     echo "Group: " . $productGroup['GroupCode'] . " - " . $productGroup['Description'];
     *     echo "Is Active: " . ($productGroup['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/ProductGroups', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific product group by its GUID.
     *
     * This method fetches a single product group from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the product group to retrieve
     *
     * @return array|null The product group data if found, null if the product group doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGroup = $productGroupsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($productGroup) {
     *     echo "Product Group found: " . $productGroup['GroupCode'];
     *     echo "Description: " . $productGroup['Description'];
     *     echo "Is Active: " . ($productGroup['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/ProductGroups/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
