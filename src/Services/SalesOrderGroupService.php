<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SalesOrderGroup;

/**
 * Service class for managing SalesOrderGroup operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SalesOrderGroup resources,
 * allowing retrieval of sales order group information. Sales order groups are used to
 * categorize and organize sales orders into logical collections, enabling better
 * order management, reporting, and workflow organization based on business criteria.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalesOrderGroupService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalesOrderGroupService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sales order groups from the Unleashed API.
     *
     * This method fetches all available sales order groups from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'GroupCode']
     *
     * @return SalesOrderGroup[] An array of SalesOrderGroup objects representing all sales order groups.
     *                           Returns an empty array if no sales order groups are found or if the API response
     *                           doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesOrderGroupService = new SalesOrderGroupService($client);
     *
     * // Get all sales order groups
     * $salesOrderGroups = $salesOrderGroupService->getAll();
     *
     * // Get sales order groups with filters
     * $filteredSalesOrderGroups = $salesOrderGroupService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'GroupCode'
     * ]);
     *
     * foreach ($salesOrderGroups as $group) {
     *     echo "Group: " . $group->getGroupCode();
     *     echo "Description: " . $group->getDescription();
     *     echo "Is Active: " . ($group->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SalesOrderGroups', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SalesOrderGroup::fromArray($item);
            },
            $response['Items']
        );
    }
}
