<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\BillOfMaterial;

/**
 * Service class for managing BillOfMaterial operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with BillOfMaterial resources,
 * including CRUD operations. Bills of Materials (BOM) define the components and quantities
 * required to manufacture a product, serving as a recipe or formula for production processes.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class BillOfMaterialsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new BillOfMaterialsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all bills of materials from the Unleashed API.
     *
     * This method fetches all available bills of materials from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ProductCode']
     *
     * @return BillOfMaterial[] An array of BillOfMaterial objects representing all bills of materials.
     *                          Returns an empty array if no bills of materials are found or if the API response
     *                          doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $billOfMaterialsService = new BillOfMaterialsService($client);
     *
     * // Get all bills of materials
     * $billsOfMaterials = $billOfMaterialsService->getAll();
     *
     * // Get bills of materials with filters
     * $filteredBillsOfMaterials = $billOfMaterialsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ProductCode'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/BillOfMaterials', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return BillOfMaterial::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific bill of material by its GUID.
     *
     * This method fetches a single bill of material from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the bill of material to retrieve
     *
     * @return BillOfMaterial|null The BillOfMaterial object if found, null if the bill of material doesn't exist
     *                            or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $billOfMaterial = $billOfMaterialsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($billOfMaterial) {
     *     echo "Bill of Material found: " . $billOfMaterial->getProductCode();
     *     echo "Description: " . $billOfMaterial->getDescription();
     * }
     * ```
     */
    public function getById(string $guid): ?BillOfMaterial
    {
        $response = $this->client->get("/BillOfMaterials/{$guid}");

        if (empty($response)) {
            return null;
        }

        return BillOfMaterial::fromArray($response);
    }

    /**
     * Creates a new bill of material in the Unleashed system.
     *
     * This method creates a new bill of material with the provided data. The data can be provided
     * either as an array or as a BillOfMaterial DTO object. Raw data is used directly to avoid
     * DTO conversion issues during creation.
     *
     * @param array|BillOfMaterial $data The bill of material data to create. Can be an array of data
     *                                   or a BillOfMaterial DTO object
     *
     * @return BillOfMaterial The created BillOfMaterial object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create bill of material from array
     * $bomData = [
     *     'ProductCode' => 'PROD-001',
     *     'Description' => 'Main Product BOM',
     *     'Quantity' => 1,
     *     'Lines' => [
     *         [
     *             'ProductCode' => 'COMP-001',
     *             'Quantity' => 2,
     *             'Description' => 'Component 1'
     *         ]
     *     ]
     * ];
     * $newBillOfMaterial = $billOfMaterialsService->create($bomData);
     *
     * // Create bill of material from DTO
     * $billOfMaterial = new BillOfMaterial($bomData);
     * $newBillOfMaterial = $billOfMaterialsService->create($billOfMaterial);
     * ```
     */
    public function create(array|BillOfMaterial $data): BillOfMaterial
    {
        // Use raw data directly to avoid DTO conversion issues
        $rawData = is_array($data) ? $data : $data->toArray();

        $response = $this->client->post('/BillOfMaterials', $rawData);

        if (empty($response)) {
        }

        return BillOfMaterial::fromArray($response);
    }

    /**
     * Updates an existing bill of material in the Unleashed system.
     *
     * This method updates an existing bill of material with the provided data. The data can be provided
     * either as an array or as a BillOfMaterial DTO object.
     *
     * @param string               $guid The unique identifier (GUID) of the bill of material to update
     * @param array|BillOfMaterial $data The updated bill of material data. Can be an array of data
     *                                   or a BillOfMaterial DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $billOfMaterialGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Description' => 'Updated BOM Description',
     *     'Quantity' => 2
     * ];
     * $response = $billOfMaterialsService->update($billOfMaterialGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|BillOfMaterial $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $billofmaterial = BillOfMaterial::fromArray($data);
        } else {
            $billofmaterial = $data;
        }

        $response = $this->client->put("/BillOfMaterials/{$guid}", $billofmaterial->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a bill of material from the Unleashed system.
     *
     * This method permanently removes a bill of material from the Unleashed system.
     * Note: Deleting a bill of material may affect production processes and manufacturing workflows
     * that depend on this BOM.
     *
     * @param string $guid The unique identifier (GUID) of the bill of material to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $billOfMaterialGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $billOfMaterialsService->delete($billOfMaterialGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/BillOfMaterials/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
