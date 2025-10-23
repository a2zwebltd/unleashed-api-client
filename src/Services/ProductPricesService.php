<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\ProductPrice;

/**
 * Service class for managing ProductPrice operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with ProductPrice resources,
 * allowing retrieval of product pricing information. Product prices define the
 * cost and selling prices for products, including tiered pricing, customer-specific
 * pricing, and promotional pricing structures.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class ProductPricesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new ProductPricesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all product prices from the Unleashed API.
     *
     * This method fetches all available product prices from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ProductCode']
     *
     * @return ProductPrice[] An array of ProductPrice objects representing all product prices.
     *                        Returns an empty array if no product prices are found or if the API response
     *                        doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productPricesService = new ProductPricesService($client);
     *
     * // Get all product prices
     * $productPrices = $productPricesService->getAll();
     *
     * // Get product prices with filters
     * $filteredProductPrices = $productPricesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ProductCode'
     * ]);
     *
     * foreach ($productPrices as $productPrice) {
     *     echo "Product: " . $productPrice->getProductCode();
     *     echo "Selling Price: " . $productPrice->getSellingPrice();
     *     echo "Cost Price: " . $productPrice->getCostPrice();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/ProductPrices', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return ProductPrice::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific product price by its GUID.
     *
     * This method fetches a single product price from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the product price to retrieve
     *
     * @return ProductPrice|null The ProductPrice object if found, null if the product price doesn't exist
     *                           or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productPrice = $productPricesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($productPrice) {
     *     echo "Product Price found: " . $productPrice->getProductCode();
     *     echo "Selling Price: " . $productPrice->getSellingPrice();
     *     echo "Cost Price: " . $productPrice->getCostPrice();
     *     echo "Currency: " . $productPrice->getCurrencyCode();
     * }
     * ```
     */
    public function getById(string $guid): ?ProductPrice
    {
        $response = $this->client->get("/ProductPrices/{$guid}");

        if (empty($response)) {
            return null;
        }

        return ProductPrice::fromArray($response);
    }
}
