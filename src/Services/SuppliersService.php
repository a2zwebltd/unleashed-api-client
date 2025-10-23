<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\Supplier;

/**
 * Service class for managing Supplier operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with Supplier resources,
 * allowing retrieval of supplier information. Suppliers represent vendors and
 * business partners who provide goods or services to the organization, enabling
 * proper supplier relationship management, procurement tracking, and supply chain coordination.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SuppliersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SuppliersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all suppliers from the Unleashed API.
     *
     * This method fetches all available suppliers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'SupplierName']
     *
     * @return Supplier[] An array of Supplier objects representing all suppliers.
     *                   Returns an empty array if no suppliers are found or if the API response
     *                   doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $suppliersService = new SuppliersService($client);
     *
     * // Get all suppliers
     * $suppliers = $suppliersService->getAll();
     *
     * // Get suppliers with filters
     * $filteredSuppliers = $suppliersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'SupplierName'
     * ]);
     *
     * foreach ($suppliers as $supplier) {
     *     echo "Supplier: " . $supplier->getSupplierName();
     *     echo "Contact: " . $supplier->getContactName();
     *     echo "Phone: " . $supplier->getPhone();
     *     echo "Email: " . $supplier->getEmail();
     *     echo "Is Active: " . ($supplier->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Suppliers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Supplier::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific supplier by its GUID.
     *
     * This method fetches a single supplier from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the supplier to retrieve
     *
     * @return Supplier|null The Supplier object if found, null if the supplier doesn't exist
     *                      or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $supplier = $suppliersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($supplier) {
     *     echo "Supplier found: " . $supplier->getSupplierName();
     *     echo "Contact: " . $supplier->getContactName();
     *     echo "Phone: " . $supplier->getPhone();
     *     echo "Email: " . $supplier->getEmail();
     *     echo "Address: " . $supplier->getAddress();
     *     echo "Payment Terms: " . $supplier->getPaymentTerms();
     * }
     * ```
     */
    public function getById(string $guid): ?Supplier
    {
        $response = $this->client->get("/Suppliers/{$guid}");

        if (empty($response)) {
            return null;
        }

        return Supplier::fromArray($response);
    }
}
