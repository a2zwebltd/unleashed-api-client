<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SerialNumber;

/**
 * Service class for managing SerialNumber operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SerialNumber resources,
 * allowing retrieval of serial number information. Serial numbers represent unique
 * identifiers assigned to individual products or items, enabling precise tracking
 * of inventory, warranty management, and product lifecycle management.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SerialNumbersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SerialNumbersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all serial numbers from the Unleashed API.
     *
     * This method fetches all available serial numbers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'SerialNumber']
     *
     * @return SerialNumber[] An array of SerialNumber objects representing all serial numbers.
     *                        Returns an empty array if no serial numbers are found or if the API response
     *                        doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $serialNumbersService = new SerialNumbersService($client);
     *
     * // Get all serial numbers
     * $serialNumbers = $serialNumbersService->getAll();
     *
     * // Get serial numbers with filters
     * $filteredSerialNumbers = $serialNumbersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'SerialNumber'
     * ]);
     *
     * foreach ($serialNumbers as $serialNumber) {
     *     echo "Serial Number: " . $serialNumber->getSerialNumber();
     *     echo "Product: " . $serialNumber->getProductName();
     *     echo "Status: " . $serialNumber->getStatus();
     *     echo "Location: " . $serialNumber->getLocation();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SerialNumbers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SerialNumber::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific serial number by its GUID.
     *
     * This method fetches a single serial number from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the serial number to retrieve
     *
     * @return SerialNumber|null The SerialNumber object if found, null if the serial number doesn't exist
     *                          or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $serialNumber = $serialNumbersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($serialNumber) {
     *     echo "Serial Number found: " . $serialNumber->getSerialNumber();
     *     echo "Product: " . $serialNumber->getProductName();
     *     echo "Status: " . $serialNumber->getStatus();
     *     echo "Location: " . $serialNumber->getLocation();
     *     echo "Warranty Expiry: " . $serialNumber->getWarrantyExpiry();
     * }
     * ```
     */
    public function getById(string $guid): ?SerialNumber
    {
        $response = $this->client->get("/SerialNumbers/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SerialNumber::fromArray($response);
    }
}
