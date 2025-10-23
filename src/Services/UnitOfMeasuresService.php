<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing UnitOfMeasure operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with UnitOfMeasure resources,
 * allowing retrieval of unit of measure information. Units of measure represent
 * standardized measurement units used for products and inventory, enabling proper
 * quantity tracking, pricing calculations, and international trade compliance.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class UnitOfMeasuresService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new UnitOfMeasuresService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all units of measure from the Unleashed API.
     *
     * This method fetches all available units of measure from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'UnitName']
     *
     * @return array An array of unit of measure data representing all units.
     *               Returns an empty array if no units of measure are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $unitOfMeasuresService = new UnitOfMeasuresService($client);
     *
     * // Get all units of measure
     * $unitsOfMeasure = $unitOfMeasuresService->getAll();
     *
     * // Get units of measure with filters
     * $filteredUnitsOfMeasure = $unitOfMeasuresService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'UnitName'
     * ]);
     *
     * foreach ($unitsOfMeasure as $unit) {
     *     echo "Unit: " . $unit['UnitName'];
     *     echo "Code: " . $unit['UnitCode'];
     *     echo "Type: " . $unit['UnitType'];
     *     echo "Is Active: " . ($unit['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/UnitOfMeasures', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific unit of measure by its GUID.
     *
     * This method fetches a single unit of measure from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the unit of measure to retrieve
     *
     * @return array|null The unit of measure data if found, null if the unit of measure doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $unitOfMeasure = $unitOfMeasuresService->getById('12345678-1234-1234-1234-123456789012');
     * if ($unitOfMeasure) {
     *     echo "Unit of Measure found: " . $unitOfMeasure['UnitName'];
     *     echo "Code: " . $unitOfMeasure['UnitCode'];
     *     echo "Type: " . $unitOfMeasure['UnitType'];
     *     echo "Description: " . $unitOfMeasure['Description'];
     *     echo "Is Active: " . ($unitOfMeasure['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/UnitOfMeasures/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
