<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing Tax operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with Tax resources,
 * allowing retrieval of tax information. Taxes represent various tax rates
 * and rules applied to transactions, enabling proper tax calculation,
 * compliance reporting, and financial accuracy in business operations.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class TaxesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new TaxesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all taxes from the Unleashed API.
     *
     * This method fetches all available taxes from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'TaxName']
     *
     * @return array An array of tax data representing all taxes.
     *               Returns an empty array if no taxes are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $taxesService = new TaxesService($client);
     *
     * // Get all taxes
     * $taxes = $taxesService->getAll();
     *
     * // Get taxes with filters
     * $filteredTaxes = $taxesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'TaxName'
     * ]);
     *
     * foreach ($taxes as $tax) {
     *     echo "Tax: " . $tax['TaxName'];
     *     echo "Rate: " . $tax['TaxRate'] . "%";
     *     echo "Type: " . $tax['TaxType'];
     *     echo "Is Active: " . ($tax['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Taxes', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific tax by its GUID.
     *
     * This method fetches a single tax from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the tax to retrieve
     *
     * @return array|null The tax data if found, null if the tax doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $tax = $taxesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($tax) {
     *     echo "Tax found: " . $tax['TaxName'];
     *     echo "Rate: " . $tax['TaxRate'] . "%";
     *     echo "Type: " . $tax['TaxType'];
     *     echo "Description: " . $tax['Description'];
     *     echo "Is Active: " . ($tax['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/Taxes/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
