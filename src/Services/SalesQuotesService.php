<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SalesQuote;

/**
 * Service class for managing SalesQuote operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SalesQuote resources,
 * allowing retrieval of sales quote information. Sales quotes represent formal
 * price estimates provided to customers for goods or services, serving as the
 * foundation for potential sales orders and customer negotiations.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalesQuotesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalesQuotesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sales quotes from the Unleashed API.
     *
     * This method fetches all available sales quotes from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'QuoteNumber']
     *
     * @return SalesQuote[] An array of SalesQuote objects representing all sales quotes.
     *                      Returns an empty array if no sales quotes are found or if the API response
     *                      doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesQuotesService = new SalesQuotesService($client);
     *
     * // Get all sales quotes
     * $salesQuotes = $salesQuotesService->getAll();
     *
     * // Get sales quotes with filters
     * $filteredSalesQuotes = $salesQuotesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'QuoteNumber'
     * ]);
     *
     * foreach ($salesQuotes as $quote) {
     *     echo "Quote: " . $quote->getQuoteNumber();
     *     echo "Customer: " . $quote->getCustomerName();
     *     echo "Total: " . $quote->getTotal();
     *     echo "Status: " . $quote->getStatus();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SalesQuotes', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SalesQuote::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific sales quote by its GUID.
     *
     * This method fetches a single sales quote from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the sales quote to retrieve
     *
     * @return SalesQuote|null The SalesQuote object if found, null if the sales quote doesn't exist
     *                        or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesQuote = $salesQuotesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($salesQuote) {
     *     echo "Sales Quote found: " . $salesQuote->getQuoteNumber();
     *     echo "Customer: " . $salesQuote->getCustomerName();
     *     echo "Total: " . $salesQuote->getTotal();
     *     echo "Valid Until: " . $salesQuote->getValidUntil();
     *     echo "Status: " . $salesQuote->getStatus();
     * }
     * ```
     */
    public function getById(string $guid): ?SalesQuote
    {
        $response = $this->client->get("/SalesQuotes/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SalesQuote::fromArray($response);
    }
}
