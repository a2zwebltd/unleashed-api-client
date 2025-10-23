<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\ShippingCompany;

/**
 * Service class for managing ShippingCompany operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with ShippingCompany resources,
 * allowing retrieval of shipping company information. Shipping companies represent
 * logistics providers and carriers used for delivering goods to customers,
 * enabling proper tracking, cost management, and delivery coordination.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class ShippingCompaniesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new ShippingCompaniesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all shipping companies from the Unleashed API.
     *
     * This method fetches all available shipping companies from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CompanyName']
     *
     * @return ShippingCompany[] An array of ShippingCompany objects representing all shipping companies.
     *                          Returns an empty array if no shipping companies are found or if the API response
     *                          doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $shippingCompaniesService = new ShippingCompaniesService($client);
     *
     * // Get all shipping companies
     * $shippingCompanies = $shippingCompaniesService->getAll();
     *
     * // Get shipping companies with filters
     * $filteredShippingCompanies = $shippingCompaniesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CompanyName'
     * ]);
     *
     * foreach ($shippingCompanies as $company) {
     *     echo "Company: " . $company->getCompanyName();
     *     echo "Contact: " . $company->getContactName();
     *     echo "Phone: " . $company->getPhone();
     *     echo "Is Active: " . ($company->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/ShippingCompanies', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return ShippingCompany::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific shipping company by its GUID.
     *
     * This method fetches a single shipping company from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the shipping company to retrieve
     *
     * @return ShippingCompany|null The ShippingCompany object if found, null if the shipping company doesn't exist
     *                             or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $shippingCompany = $shippingCompaniesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($shippingCompany) {
     *     echo "Shipping Company found: " . $shippingCompany->getCompanyName();
     *     echo "Contact: " . $shippingCompany->getContactName();
     *     echo "Phone: " . $shippingCompany->getPhone();
     *     echo "Email: " . $shippingCompany->getEmail();
     *     echo "Address: " . $shippingCompany->getAddress();
     * }
     * ```
     */
    public function getById(string $guid): ?ShippingCompany
    {
        $response = $this->client->get("/ShippingCompanies/{$guid}");

        if (empty($response)) {
            return null;
        }

        return ShippingCompany::fromArray($response);
    }
}
