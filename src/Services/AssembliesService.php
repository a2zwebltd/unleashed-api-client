<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Assembly;

/**
 * Service class for managing Assembly operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with Assembly resources,
 * including CRUD operations, assembly line management, and assembly completion.
 * Assemblies represent manufacturing or assembly processes in the Unleashed system.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class AssembliesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new AssembliesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all assemblies from the Unleashed API.
     *
     * This method fetches all available assemblies from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'AssemblyNumber']
     *
     * @return Assembly[] An array of Assembly objects representing all assemblies.
     *                   Returns an empty array if no assemblies are found or if the API response
     *                   doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assembliesService = new AssembliesService($client);
     *
     * // Get all assemblies
     * $assemblies = $assembliesService->getAll();
     *
     * // Get assemblies with filters
     * $filteredAssemblies = $assembliesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'AssemblyNumber'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Assemblies', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Assembly::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific assembly by its GUID.
     *
     * This method fetches a single assembly from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the assembly to retrieve
     *
     * @return Assembly|null The Assembly object if found, null if the assembly doesn't exist
     *                      or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assembly = $assembliesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($assembly) {
     *     echo "Assembly found: " . $assembly->getAssemblyNumber();
     * }
     * ```
     */
    public function getById(string $guid): ?Assembly
    {
        $response = $this->client->get("/Assemblies/{$guid}");

        if (empty($response)) {
            return null;
        }

        return Assembly::fromArray($response);
    }

    /**
     * Creates a new assembly in the Unleashed system.
     *
     * This method creates a new assembly with the provided data. The data can be provided
     * either as an array or as an Assembly DTO object.
     *
     * @param array|Assembly $data The assembly data to create. Can be an array of data
     *                             or an Assembly DTO object
     *
     * @return Assembly The created Assembly object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create assembly from array
     * $assemblyData = [
     *     'AssemblyNumber' => 'ASM-001',
     *     'Description' => 'Test Assembly',
     *     'Quantity' => 10
     * ];
     * $newAssembly = $assembliesService->create($assemblyData);
     *
     * // Create assembly from DTO
     * $assembly = new Assembly($assemblyData);
     * $newAssembly = $assembliesService->create($assembly);
     * ```
     */
    public function create(array|Assembly $data): Assembly
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $assembly = Assembly::fromArray($data);
        } else {
            $assembly = $data;
        }

        $response = $this->client->post('/Assemblies', $assembly->toArray());


        return Assembly::fromArray($response);
    }

    /**
     * Updates an existing assembly in the Unleashed system.
     *
     * This method updates an existing assembly with the provided data. The data can be provided
     * either as an array or as an Assembly DTO object.
     *
     * @param string         $guid The unique identifier (GUID) of the assembly to update
     * @param array|Assembly $data The updated assembly data. Can be an array of data
     *                             or an Assembly DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Description' => 'Updated Assembly Description',
     *     'Quantity' => 15
     * ];
     * $response = $assembliesService->update($assemblyGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|Assembly $data): array
    {

        // If array, create DTO from it
        if (is_array($data)) {
            $assembly = Assembly::fromArray($data);
        } else {
            $assembly = $data;
        }

        $response = $this->client->put("/Assemblies/{$guid}", $assembly->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes an assembly from the Unleashed system.
     *
     * This method permanently removes an assembly from the Unleashed system.
     *
     * @param string $guid The unique identifier (GUID) of the assembly to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $assembliesService->delete($assemblyGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/Assemblies/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        var_dump($response);
        return $response;
    }

    /**
     * Creates assembly lines for an existing assembly.
     *
     * This method adds assembly lines to an existing assembly, allowing you to specify
     * the components and quantities required for the assembly process.
     *
     * @param string $assemblyGuid The unique identifier (GUID) of the assembly to add lines to
     * @param array  $lineData     The assembly line data containing component information,
     *                             quantities, and other line-specific details
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $lineData = [
     *     'Product' => ['Guid' => 'product-guid-here'],
     *     'Quantity' => 5,
     *     'Description' => 'Component for assembly'
     * ];
     * $response = $assembliesService->createAssemblyLine($assemblyGuid, $lineData);
     * ```
     */
    public function createAssemblyLine(string $assemblyGuid, array $lineData): array
    {
        $response = $this->client->post("/Assemblies/{$assemblyGuid}/Lines", $lineData);


        return $response;
    }

    /**
     * Completes an existing assembly.
     *
     * This method marks an assembly as completed in the Unleashed system.
     * The completion process may trigger various business rules and workflows.
     *
     * @param string $assemblyGuid The unique identifier (GUID) of the assembly to complete
     *
     * @return bool True if the assembly was successfully completed, false if an error occurred
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $success = $assembliesService->completeAssembly($assemblyGuid);
     * if ($success) {
     *     echo "Assembly completed successfully";
     * } else {
     *     echo "Failed to complete assembly";
     * }
     * ```
     */
    public function completeAssembly(string $assemblyGuid): bool
    {
        try {
            $response = $this->client->post("/Assemblies/{$assemblyGuid}/Complete", []);
            // The complete endpoint might return empty response or specific status
            // Consider it successful if no exception is thrown
            return true;
        } catch (\Exception $e) {
            // Log the actual error for debugging
            error_log("Complete Assembly Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Updates an existing assembly line.
     *
     * This method modifies an existing assembly line within an assembly,
     * allowing you to update quantities, descriptions, or other line properties.
     *
     * @param string $assemblyGuid     The unique identifier (GUID) of the assembly containing the line
     * @param string $assemblyLineGuid The unique identifier (GUID) of the assembly line to update
     * @param array  $lineData         The updated assembly line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $updateData = [
     *     'Quantity' => 10,
     *     'Description' => 'Updated component description'
     * ];
     * $response = $assembliesService->updateAssemblyLine($assemblyGuid, $lineGuid, $updateData);
     * ```
     */
    public function updateAssemblyLine(string $assemblyGuid, string $assemblyLineGuid, array $lineData): array
    {
        $response = $this->client->put("/Assemblies/{$assemblyGuid}/Lines/{$assemblyLineGuid}", $lineData);

        // Some APIs return empty response for successful updates
        // Return the response even if empty, as it might indicate success
        return $response;
    }

    /**
     * Deletes an assembly line from a parked assembly.
     *
     * This method removes an assembly line from an existing assembly.
     * Note: This operation is typically only allowed on parked (not completed) assemblies.
     *
     * @param string $assemblyGuid     The unique identifier (GUID) of the assembly containing the line
     * @param string $assemblyLineGuid The unique identifier (GUID) of the assembly line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $assemblyGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $assembliesService->deleteAssemblyLine($assemblyGuid, $lineGuid);
     * ```
     */
    public function deleteAssemblyLine(string $assemblyGuid, string $assemblyLineGuid): array
    {
        $response = $this->client->delete("/Assemblies/{$assemblyGuid}/Lines/{$assemblyLineGuid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
