<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\Company;

/**
 * Service class for managing company-related operations with the Unleashed API.
 *
 * This service provides methods to interact with company data endpoints,
 * allowing retrieval of company information from the Unleashed system.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CompaniesService
{
    /**
     * The Unleashed API client instance used for making HTTP requests.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CompaniesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all companies from the Unleashed API.
     *
     * This method fetches all companies available in the Unleashed system,
     * optionally filtered by the provided criteria. The response is converted
     * into an array of Company DTO objects for easy manipulation.
     *
     * @param array $filters Optional array of filters to apply to the request.
     *                       Common filters include:
     *                       - 'modifiedSince' (string): ISO 8601 date string
     *                       - 'pageSize' (int): Number of items per page
     *                       - 'pageNumber' (int): Page number to retrieve
     *
     * @return Company[] Array of Company DTO objects representing the companies.
     *                   Returns an empty array if no companies are found or
     *                   if the API response is invalid.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $companies = $companiesService->getAll();
     *
     * // With filters
     * $companies = $companiesService->getAll([
     *     'modifiedSince' => '2023-01-01T00:00:00Z',
     *     'pageSize' => 50
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Companies', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Company::fromArray($item);
            },
            $response['Items']
        );
    }
}
