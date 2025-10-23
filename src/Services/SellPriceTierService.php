<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SellPriceTier;

/**
 * Service class for managing SellPriceTier operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SellPriceTier resources,
 * allowing retrieval of pricing tier information. Sell price tiers represent
 * different pricing levels or categories that can be applied to products,
 * enabling flexible pricing strategies based on customer segments, volume discounts,
 * or other business criteria.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SellPriceTierService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SellPriceTierService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sell price tiers from the Unleashed API.
     *
     * This method fetches all available sell price tiers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'TierName']
     *
     * @return SellPriceTier[] An array of SellPriceTier objects representing all sell price tiers.
     *                        Returns an empty array if no sell price tiers are found or if the API response
     *                        doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $sellPriceTierService = new SellPriceTierService($client);
     *
     * // Get all sell price tiers
     * $sellPriceTiers = $sellPriceTierService->getAll();
     *
     * // Get sell price tiers with filters
     * $filteredSellPriceTiers = $sellPriceTierService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'TierName'
     * ]);
     *
     * foreach ($sellPriceTiers as $tier) {
     *     echo "Tier: " . $tier->getTierName();
     *     echo "Description: " . $tier->getDescription();
     *     echo "Is Active: " . ($tier->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SellPriceTiers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SellPriceTier::fromArray($item);
            },
            $response['Items']
        );
    }
}
