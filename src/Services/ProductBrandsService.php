<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing ProductBrand operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with ProductBrand resources,
 * allowing retrieval of product brand information. Product brands are used to
 * categorize and organize products by manufacturer or brand name, enabling better
 * product management, filtering, and reporting based on brand characteristics.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class ProductBrandsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new ProductBrandsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all product brands from the Unleashed API.
     *
     * This method fetches all available product brands from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'BrandCode']
     *
     * @return array An array of product brand data representing all product brands.
     *               Returns an empty array if no product brands are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productBrandsService = new ProductBrandsService($client);
     *
     * // Get all product brands
     * $productBrands = $productBrandsService->getAll();
     *
     * // Get product brands with filters
     * $filteredProductBrands = $productBrandsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'BrandCode'
     * ]);
     *
     * foreach ($productBrands as $productBrand) {
     *     echo "Brand: " . $productBrand['BrandCode'] . " - " . $productBrand['Description'];
     *     echo "Is Active: " . ($productBrand['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/ProductBrands', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific product brand by its GUID.
     *
     * This method fetches a single product brand from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the product brand to retrieve
     *
     * @return array|null The product brand data if found, null if the product brand doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productBrand = $productBrandsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($productBrand) {
     *     echo "Product Brand found: " . $productBrand['BrandCode'];
     *     echo "Description: " . $productBrand['Description'];
     *     echo "Is Active: " . ($productBrand['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/ProductBrands/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
