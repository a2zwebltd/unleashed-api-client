<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\BatchNumber;

/**
 * Service class for managing BatchNumber operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with BatchNumber resources,
 * allowing retrieval of batch number information. Batch numbers are used for
 * tracking and managing inventory batches, particularly useful for products
 * with expiration dates, lot tracking, or quality control requirements.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class BatchNumbersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new BatchNumbersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all batch numbers from the Unleashed API.
     *
     * This method fetches all available batch numbers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'BatchNumber']
     *
     * @return BatchNumber[] An array of BatchNumber objects representing all batch numbers.
     *                       Returns an empty array if no batch numbers are found or if the API response
     *                       doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $batchNumbersService = new BatchNumbersService($client);
     *
     * // Get all batch numbers
     * $batchNumbers = $batchNumbersService->getAll();
     *
     * // Get batch numbers with filters
     * $filteredBatchNumbers = $batchNumbersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'BatchNumber'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/BatchNumbers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return BatchNumber::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific batch number by its GUID.
     *
     * This method fetches a single batch number from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the batch number to retrieve
     *
     * @return BatchNumber|null The BatchNumber object if found, null if the batch number doesn't exist
     *                         or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $batchNumber = $batchNumbersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($batchNumber) {
     *     echo "Batch Number found: " . $batchNumber->getBatchNumber();
     *     echo "Expiry Date: " . $batchNumber->getExpiryDate();
     * }
     * ```
     */
    public function getById(string $guid): ?BatchNumber
    {
        $response = $this->client->get("/BatchNumbers/{$guid}");

        if (empty($response)) {
            return null;
        }

        return BatchNumber::fromArray($response);
    }
}
