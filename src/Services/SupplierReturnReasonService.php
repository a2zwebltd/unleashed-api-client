<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SupplierReturnReason;

/**
 * Service class for managing SupplierReturnReason operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SupplierReturnReason resources,
 * allowing retrieval of supplier return reason information. Supplier return reasons represent
 * predefined categories for why goods are returned to suppliers, enabling proper tracking
 * and analysis of return patterns, supplier performance, and quality control processes.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SupplierReturnReasonService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SupplierReturnReasonService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all supplier return reasons from the Unleashed API.
     *
     * This method fetches all available supplier return reasons from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ReasonName']
     *
     * @return SupplierReturnReason[] An array of SupplierReturnReason objects representing all supplier return
     *                               reasons. Returns an empty array if no supplier return reasons are found or if
     *                               the API response doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplierReturnReasonService = new SupplierReturnReasonService($client);
     *
     * // Get all supplier return reasons
     * $supplierReturnReasons = $supplierReturnReasonService->getAll();
     *
     * // Get supplier return reasons with filters
     * $filteredSupplierReturnReasons = $supplierReturnReasonService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ReasonName'
     * ]);
     *
     * foreach ($supplierReturnReasons as $reason) {
     *     echo "Reason: " . $reason->getReasonName();
     *     echo "Description: " . $reason->getDescription();
     *     echo "Is Active: " . ($reason->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SupplierReturnReasons', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SupplierReturnReason::fromArray($item);
            },
            $response['Items']
        );
    }
}
