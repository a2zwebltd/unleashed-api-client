<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\RecostAdjustment;

/**
 * Service class for managing RecostAdjustment operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with RecostAdjustment resources,
 * allowing retrieval of recost adjustment information. Recost adjustments are used to
 * modify the cost values of inventory items, typically for inventory revaluation,
 * cost corrections, or accounting adjustments to reflect current market values.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class RecostAdjustmentService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new RecostAdjustmentService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all recost adjustments from the Unleashed API.
     *
     * This method fetches all available recost adjustments from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'AdjustmentDate']
     *
     * @return RecostAdjustment[] An array of RecostAdjustment objects representing all recost adjustments.
     *                            Returns an empty array if no recost adjustments are found or if the API response
     *                            doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $recostAdjustmentService = new RecostAdjustmentService($client);
     *
     * // Get all recost adjustments
     * $recostAdjustments = $recostAdjustmentService->getAll();
     *
     * // Get recost adjustments with filters
     * $filteredRecostAdjustments = $recostAdjustmentService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'AdjustmentDate'
     * ]);
     *
     * foreach ($recostAdjustments as $adjustment) {
     *     echo "Adjustment: " . $adjustment->getAdjustmentNumber();
     *     echo "Product: " . $adjustment->getProductCode();
     *     echo "New Cost: " . $adjustment->getNewCost();
     *     echo "Old Cost: " . $adjustment->getOldCost();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/RecostAdjustments', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return RecostAdjustment::fromArray($item);
            },
            $response['Items']
        );
    }
}
