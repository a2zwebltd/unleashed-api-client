<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Product;

/**
 * Service class for managing Product operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with Product resources,
 * including CRUD operations and product lifecycle management. Products represent
 * the items that can be sold, tracked in inventory, and managed throughout their
 * lifecycle from creation to obsolescence.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class ProductsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new ProductsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all products from the Unleashed API.
     *
     * This method fetches all available products from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ProductCode']
     *
     * @return Product[] An array of Product objects representing all products.
     *                   Returns an empty array if no products are found or if the API response
     *                   doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productsService = new ProductsService($client);
     *
     * // Get all products
     * $products = $productsService->getAll();
     *
     * // Get products with filters
     * $filteredProducts = $productsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ProductCode'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Products', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Product::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific product by its GUID.
     *
     * This method fetches a single product from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the product to retrieve
     *
     * @return Product|null The Product object if found, null if the product doesn't exist
     *                     or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $product = $productsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($product) {
     *     echo "Product found: " . $product->getProductCode();
     *     echo "Description: " . $product->getDescription();
     *     echo "Selling Price: " . $product->getSellingPrice();
     * }
     * ```
     */
    public function getById(string $guid): ?Product
    {
        $response = $this->client->get("/Products/{$guid}");

        if (empty($response)) {
            return null;
        }

        return Product::fromArray($response);
    }


    /**
     * Creates a new product in the Unleashed system.
     *
     * This method creates a new product with the provided data. The data can be provided
     * either as an array or as a Product DTO object.
     *
     * @param array|Product $data The product data to create. Can be an array of data
     *                            or a Product DTO object
     *
     * @return Product The created Product object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create product from array
     * $productData = [
     *     'ProductCode' => 'PROD-001',
     *     'Description' => 'Sample Product',
     *     'SellingPrice' => 99.99,
     *     'CostPrice' => 50.00,
     *     'IsActive' => true
     * ];
     * $newProduct = $productsService->create($productData);
     *
     * // Create product from DTO
     * $product = new Product($productData);
     * $newProduct = $productsService->create($product);
     * ```
     */
    public function create(array|Product $data): Product
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $product = Product::fromArray($data);
        } else {
            $product = $data;
        }

        $response = $this->client->post('/Products', $product->toArray());


        return Product::fromArray($response);
    }

    /**
     * Updates an existing product in the Unleashed system.
     *
     * This method updates an existing product with the provided data. The data can be provided
     * either as an array or as a Product DTO object. This method automatically handles
     * API compatibility by trying PUT first and falling back to POST if needed.
     *
     * @param string        $guid The unique identifier (GUID) of the product to update
     * @param array|Product $data The updated product data. Can be an array of data
     *                            or a Product DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $productGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Description' => 'Updated Product Description',
     *     'SellingPrice' => 129.99,
     *     'IsActive' => true
     * ];
     * $response = $productsService->update($productGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|Product $data): array
    {

        // If array, create DTO from it
        if (is_array($data)) {
            $product = Product::fromArray($data);
        } else {
            $product = $data;
        }

        // Try PUT first, fallback to POST if 405 Method Not Allowed
        try {
            $response = $this->client->put("/Products/{$guid}", $product->toArray());
        } catch (\Unleashed\ApiClient\Exceptions\ApiException $e) {
            if ($e->getStatusCode() === 405) {
                // Fallback to POST if PUT is not supported
                $response = $this->client->post("/Products/{$guid}", $product->toArray());
            } else {
                throw $e;
            }
        }

        // For PUT/POST operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a product from the Unleashed system.
     *
     * This method permanently removes a product from the Unleashed system.
     * Note: Deleting a product may affect related orders, inventory, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the product to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $productsService->delete($productGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/Products/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Updates a product using POST method.
     *
     * This method provides an alternative update mechanism using POST instead of PUT.
     * Useful for specific product update scenarios that require POST semantics.
     *
     * @param string $guid The unique identifier (GUID) of the product to update
     * @param array  $data The updated product data as an array
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Description' => 'Updated Product Description',
     *     'SellingPrice' => 129.99
     * ];
     * $response = $productsService->updatePost($productGuid, $updateData);
     * ```
     */
    public function updatePost(string $guid, array $data): array
    {
        $response = $this->client->post("/Products/{$guid}", $data);

        return $response;
    }

    /**
     * Obsoletes a product in the Unleashed system.
     *
     * This method marks a product as obsolete, effectively removing it from active
     * use while preserving historical data and relationships. Obsolete products
     * are typically not available for new orders but remain in the system for
     * reporting and historical purposes.
     *
     * @param string $guid The unique identifier (GUID) of the product to obsolete
     *
     * @return array The raw API response from the obsolete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $productGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $productsService->obsolete($productGuid);
     * ```
     */
    public function obsolete(string $guid): array
    {
        $response = $this->client->post("/Products/Obsolete/{$guid}", []);

        return $response;
    }
}
