<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing CustomerType operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with CustomerType resources,
 * allowing retrieval of customer type information. Customer types are used to
 * categorize customers based on their characteristics, business relationships,
 * or purchasing patterns, enabling better customer segmentation and management.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CustomerTypesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CustomerTypesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all customer types from the Unleashed API.
     *
     * This method fetches all available customer types from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CustomerTypeCode']
     *
     * @return array An array of customer type data representing all customer types.
     *               Returns an empty array if no customer types are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerTypesService = new CustomerTypesService($client);
     *
     * // Get all customer types
     * $customerTypes = $customerTypesService->getAll();
     *
     * // Get customer types with filters
     * $filteredCustomerTypes = $customerTypesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CustomerTypeCode'
     * ]);
     *
     * foreach ($customerTypes as $customerType) {
     *     echo "Customer Type: " . $customerType['CustomerTypeCode'] . " - " . $customerType['Description'];
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/CustomerTypes', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific customer type by its GUID.
     *
     * This method fetches a single customer type from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the customer type to retrieve
     *
     * @return array|null The customer type data if found, null if the customer type doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerType = $customerTypesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($customerType) {
     *     echo "Customer Type found: " . $customerType['CustomerTypeCode'];
     *     echo "Description: " . $customerType['Description'];
     *     echo "Is Active: " . ($customerType['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/CustomerTypes/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
