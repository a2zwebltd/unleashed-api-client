<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\AttributeSet;

/**
 * Service class for managing AttributeSet operations through the Unleashed API.
 *
 * This service provides methods to interact with AttributeSet resources,
 * allowing management of attribute sets which define custom attributes
 * that can be associated with products, customers, or other entities in the Unleashed system.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class AttributeSetsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new AttributeSetsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all attribute sets from the Unleashed API.
     *
     * This method fetches all available attribute sets from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'Name']
     *
     * @return AttributeSet[] An array of AttributeSet objects representing all attribute sets.
     *                       Returns an empty array if no attribute sets are found or if the API response
     *                       doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $attributeSetsService = new AttributeSetsService($client);
     *
     * // Get all attribute sets
     * $attributeSets = $attributeSetsService->getAll();
     *
     * // Get attribute sets with filters
     * $filteredAttributeSets = $attributeSetsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'Name'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/AttributeSets', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return AttributeSet::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific attribute set by its GUID.
     *
     * This method fetches a single attribute set from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the attribute set to retrieve
     *
     * @return AttributeSet|null The AttributeSet object if found, null if the attribute set doesn't exist
     *                          or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $attributeSet = $attributeSetsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($attributeSet) {
     *     echo "Attribute Set found: " . $attributeSet->getName();
     * }
     * ```
     */
    public function getById(string $guid): ?AttributeSet
    {
        $response = $this->client->get("/AttributeSets/{$guid}");

        if (empty($response)) {
            return null;
        }

        return AttributeSet::fromArray($response);
    }

    /**
     * Creates a new attribute set in the Unleashed system.
     *
     * This method creates a new attribute set with the provided data. The data can be provided
     * either as an array or as an AttributeSet DTO object.
     *
     * @param array|AttributeSet $data The attribute set data to create. Can be an array of data
     *                                 or an AttributeSet DTO object
     *
     * @return AttributeSet The created AttributeSet object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create attribute set from array
     * $attributeSetData = [
     *     'Name' => 'Product Attributes',
     *     'Description' => 'Custom attributes for products',
     *     'IsActive' => true
     * ];
     * $newAttributeSet = $attributeSetsService->create($attributeSetData);
     *
     * // Create attribute set from DTO
     * $attributeSet = new AttributeSet($attributeSetData);
     * $newAttributeSet = $attributeSetsService->create($attributeSet);
     * ```
     */
    public function create(array|AttributeSet $data): AttributeSet
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $attributeset = AttributeSet::fromArray($data);
        } else {
            $attributeset = $data;
        }

        $response = $this->client->post('/AttributeSets', $attributeset->toArray());


        return AttributeSet::fromArray($response);
    }

    /**
     * Updates an existing attribute set in the Unleashed system.
     *
     * This method updates an existing attribute set with the provided data. The data can be provided
     * either as an array or as an AttributeSet DTO object.
     *
     * @param string             $guid The unique identifier (GUID) of the attribute set to update
     * @param array|AttributeSet $data The updated attribute set data. Can be an array of data
     *                                 or an AttributeSet DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $attributeSetGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Description' => 'Updated attribute set description',
     *     'IsActive' => false
     * ];
     * $response = $attributeSetsService->update($attributeSetGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|AttributeSet $data): array
    {

        // If array, create DTO from it
        if (is_array($data)) {
            $attributeset = AttributeSet::fromArray($data);
        } else {
            $attributeset = $data;
        }

        $response = $this->client->put("/AttributeSets/{$guid}", $attributeset->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes an attribute set from the Unleashed system.
     *
     * This method permanently removes an attribute set from the Unleashed system.
     * Note: Deleting an attribute set may affect entities that are using attributes from this set.
     *
     * @param string $guid The unique identifier (GUID) of the attribute set to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $attributeSetGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $attributeSetsService->delete($attributeSetGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/AttributeSets/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
