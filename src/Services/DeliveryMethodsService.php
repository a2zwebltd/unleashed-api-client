<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\DeliveryMethod;

/**
 * Service class for managing DeliveryMethod operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with DeliveryMethod resources,
 * allowing retrieval of delivery method information. Delivery methods define the
 * various ways in which products can be shipped or delivered to customers,
 * such as standard shipping, express delivery, pickup, or courier services.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class DeliveryMethodsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new DeliveryMethodsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all delivery methods from the Unleashed API.
     *
     * This method fetches all available delivery methods from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'DeliveryMethodCode']
     *
     * @return DeliveryMethod[] An array of DeliveryMethod objects representing all delivery methods.
     *                          Returns an empty array if no delivery methods are found or if the API response
     *                          doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $deliveryMethodsService = new DeliveryMethodsService($client);
     *
     * // Get all delivery methods
     * $deliveryMethods = $deliveryMethodsService->getAll();
     *
     * // Get delivery methods with filters
     * $filteredDeliveryMethods = $deliveryMethodsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'DeliveryMethodCode'
     * ]);
     *
     * foreach ($deliveryMethods as $deliveryMethod) {
     *     echo "Delivery Method: " . $deliveryMethod->getDeliveryMethodCode();
     *     echo "Description: " . $deliveryMethod->getDescription();
     *     echo "Cost: " . $deliveryMethod->getCost();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/DeliveryMethods', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return DeliveryMethod::fromArray($item);
            },
            $response['Items']
        );
    }
}
