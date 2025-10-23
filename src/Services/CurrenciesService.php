<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing Currency operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with Currency resources,
 * allowing retrieval of currency information. Currencies define the monetary
 * units used in the Unleashed system for pricing, invoicing, and financial reporting.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CurrenciesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CurrenciesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all currencies from the Unleashed API.
     *
     * This method fetches all available currencies from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CurrencyCode']
     *
     * @return array An array of currency data representing all currencies.
     *               Returns an empty array if no currencies are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $currenciesService = new CurrenciesService($client);
     *
     * // Get all currencies
     * $currencies = $currenciesService->getAll();
     *
     * // Get currencies with filters
     * $filteredCurrencies = $currenciesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CurrencyCode'
     * ]);
     *
     * foreach ($currencies as $currency) {
     *     echo "Currency: " . $currency['CurrencyCode'] . " - " . $currency['Description'];
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Currencies', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific currency by its GUID.
     *
     * This method fetches a single currency from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the currency to retrieve
     *
     * @return array|null The currency data if found, null if the currency doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $currency = $currenciesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($currency) {
     *     echo "Currency found: " . $currency['CurrencyCode'];
     *     echo "Description: " . $currency['Description'];
     *     echo "Exchange Rate: " . $currency['ExchangeRate'];
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/Currencies/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
