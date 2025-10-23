<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Salesperson;

/**
 * Service class for managing Salesperson operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with Salesperson resources,
 * including CRUD operations for managing sales team members. Salespersons represent
 * individuals in the sales team who are responsible for customer relationships,
 * order management, and sales performance tracking.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalespersonsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalespersonsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all salespersons from the Unleashed API.
     *
     * This method fetches all available salespersons from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'Name']
     *
     * @return Salesperson[] An array of Salesperson objects representing all salespersons.
     *                       Returns an empty array if no salespersons are found or if the API response
     *                       doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salespersonsService = new SalespersonsService($client);
     *
     * // Get all salespersons
     * $salespersons = $salespersonsService->getAll();
     *
     * // Get salespersons with filters
     * $filteredSalespersons = $salespersonsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'Name'
     * ]);
     *
     * foreach ($salespersons as $salesperson) {
     *     echo "Salesperson: " . $salesperson->getName();
     *     echo "Email: " . $salesperson->getEmail();
     *     echo "Is Active: " . ($salesperson->getIsActive() ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Salespersons', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Salesperson::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific salesperson by its GUID.
     *
     * This method fetches a single salesperson from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the salesperson to retrieve
     *
     * @return Salesperson|null The Salesperson object if found, null if the salesperson doesn't exist
     *                         or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesperson = $salespersonsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($salesperson) {
     *     echo "Salesperson found: " . $salesperson->getName();
     *     echo "Email: " . $salesperson->getEmail();
     *     echo "Phone: " . $salesperson->getPhone();
     *     echo "Commission Rate: " . $salesperson->getCommissionRate();
     * }
     * ```
     */
    public function getById(string $guid): ?Salesperson
    {
        $response = $this->client->get("/Salespersons/{$guid}");

        if (empty($response)) {
            return null;
        }

        return Salesperson::fromArray($response);
    }

    /**
     * Creates a new salesperson in the Unleashed system.
     *
     * This method creates a new salesperson with the provided data. The data can be provided
     * either as an array or as a Salesperson DTO object.
     *
     * @param array|Salesperson $data The salesperson data to create. Can be an array of data
     *                                or a Salesperson DTO object
     *
     * @return Salesperson The created Salesperson object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create salesperson from array
     * $salespersonData = [
     *     'Name' => 'John Smith',
     *     'Email' => 'john.smith@company.com',
     *     'Phone' => '+1-555-0123',
     *     'CommissionRate' => 5.0,
     *     'IsActive' => true
     * ];
     * $newSalesperson = $salespersonsService->create($salespersonData);
     *
     * // Create salesperson from DTO
     * $salesperson = new Salesperson($salespersonData);
     * $newSalesperson = $salespersonsService->create($salesperson);
     * ```
     */
    public function create(array|Salesperson $data): Salesperson
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $salesperson = Salesperson::fromArray($data);
        } else {
            $salesperson = $data;
        }

        $response = $this->client->post('/Salespersons', $salesperson->toArray());

        if (empty($response)) {
        }

        return Salesperson::fromArray($response);
    }

    /**
     * Updates an existing salesperson in the Unleashed system.
     *
     * This method updates an existing salesperson with the provided data. The data can be provided
     * either as an array or as a Salesperson DTO object.
     *
     * @param string            $guid The unique identifier (GUID) of the salesperson to update
     * @param array|Salesperson $data The updated salesperson data. Can be an array of data
     *                                or a Salesperson DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $salespersonGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Email' => 'john.smith.updated@company.com',
     *     'Phone' => '+1-555-0456',
     *     'CommissionRate' => 7.5
     * ];
     * $response = $salespersonsService->update($salespersonGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|Salesperson $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $salesperson = Salesperson::fromArray($data);
        } else {
            $salesperson = $data;
        }

        $response = $this->client->post("/Salespersons/{$guid}", $salesperson->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a salesperson from the Unleashed system.
     *
     * This method permanently removes a salesperson from the Unleashed system.
     * Note: Deleting a salesperson may affect related sales orders, customers, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the salesperson to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salespersonGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $salespersonsService->delete($salespersonGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/Salespersons/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
