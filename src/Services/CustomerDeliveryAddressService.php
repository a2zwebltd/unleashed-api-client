<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\CustomerDeliveryAddress;

/**
 * Service class for managing CustomerDeliveryAddress operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with CustomerDeliveryAddress resources,
 * allowing retrieval of customer delivery address information. Customer delivery addresses
 * define where goods should be delivered for specific customers, enabling multiple delivery
 * locations per customer for different orders or shipments.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CustomerDeliveryAddressService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CustomerDeliveryAddressService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all customer delivery addresses from the Unleashed API.
     *
     * This method fetches all available customer delivery addresses from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'AddressName']
     *
     * @return CustomerDeliveryAddress[] An array of CustomerDeliveryAddress objects representing all customer
     *                                   delivery addresses. Returns an empty array if no customer delivery addresses
     *                                   are found or if the API response doesn't contain the expected 'Items'
     *                                   structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerDeliveryAddressService = new CustomerDeliveryAddressService($client);
     *
     * // Get all customer delivery addresses
     * $deliveryAddresses = $customerDeliveryAddressService->getAll();
     *
     * // Get customer delivery addresses with filters
     * $filteredDeliveryAddresses = $customerDeliveryAddressService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'AddressName'
     * ]);
     *
     * foreach ($deliveryAddresses as $address) {
     *     echo "Delivery Address: " . $address->getAddressName();
     *     echo "Customer: " . $address->getCustomerName();
     *     echo "Address: " . $address->getAddressLine1();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/CustomerDeliveryAddresses', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return CustomerDeliveryAddress::fromArray($item);
            },
            $response['Items']
        );
    }
}
