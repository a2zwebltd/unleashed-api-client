<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\SalesShipment;

/**
 * Service class for managing SalesShipment operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with SalesShipment resources,
 * including CRUD operations for managing shipment records. Sales shipments represent
 * the physical delivery of goods to customers, tracking fulfillment of sales orders
 * and providing visibility into the shipping and logistics process.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalesShipmentsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalesShipmentsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sales shipments from the Unleashed API.
     *
     * This method fetches all available sales shipments from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'ShipmentNumber']
     *
     * @return SalesShipment[] An array of SalesShipment objects representing all sales shipments.
     *                         Returns an empty array if no sales shipments are found or if the API response
     *                         doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesShipmentsService = new SalesShipmentsService($client);
     *
     * // Get all sales shipments
     * $salesShipments = $salesShipmentsService->getAll();
     *
     * // Get sales shipments with filters
     * $filteredSalesShipments = $salesShipmentsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'ShipmentNumber'
     * ]);
     *
     * foreach ($salesShipments as $shipment) {
     *     echo "Shipment: " . $shipment->getShipmentNumber();
     *     echo "Customer: " . $shipment->getCustomerName();
     *     echo "Status: " . $shipment->getStatus();
     *     echo "Shipped Date: " . $shipment->getShippedDate();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/SalesShipments', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SalesShipment::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific sales shipment by its GUID.
     *
     * This method fetches a single sales shipment from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the sales shipment to retrieve
     *
     * @return SalesShipment|null The SalesShipment object if found, null if the sales shipment doesn't exist
     *                           or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesShipment = $salesShipmentsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($salesShipment) {
     *     echo "Sales Shipment found: " . $salesShipment->getShipmentNumber();
     *     echo "Customer: " . $salesShipment->getCustomerName();
     *     echo "Status: " . $salesShipment->getStatus();
     *     echo "Shipped Date: " . $salesShipment->getShippedDate();
     *     echo "Tracking Number: " . $salesShipment->getTrackingNumber();
     * }
     * ```
     */
    public function getById(string $guid): ?SalesShipment
    {
        $response = $this->client->get("/SalesShipments/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SalesShipment::fromArray($response);
    }

    /**
     * Creates a new sales shipment in the Unleashed system.
     *
     * This method creates a new sales shipment with the provided data. The data can be provided
     * either as an array or as a SalesShipment DTO object.
     *
     * @param array|SalesShipment $data The sales shipment data to create. Can be an array of data
     *                                  or a SalesShipment DTO object
     *
     * @return SalesShipment The created SalesShipment object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create sales shipment from array
     * $shipmentData = [
     *     'SalesOrder' => ['Guid' => 'sales-order-guid-here'],
     *     'ShipmentNumber' => 'SH-001',
     *     'ShippedDate' => '2024-01-15',
     *     'TrackingNumber' => 'TRK123456789',
     *     'Carrier' => 'FedEx',
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 5
     *         ]
     *     ]
     * ];
     * $newSalesShipment = $salesShipmentsService->create($shipmentData);
     *
     * // Create sales shipment from DTO
     * $salesShipment = new SalesShipment($shipmentData);
     * $newSalesShipment = $salesShipmentsService->create($salesShipment);
     * ```
     */
    public function create(array|SalesShipment $data): SalesShipment
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $salesshipment = SalesShipment::fromArray($data);
        } else {
            $salesshipment = $data;
        }

        $response = $this->client->post('/SalesShipments', $salesshipment->toArray());

        if (empty($response)) {
        }

        return SalesShipment::fromArray($response);
    }

    /**
     * Updates an existing sales shipment in the Unleashed system.
     *
     * This method updates an existing sales shipment with the provided data. The data can be provided
     * either as an array or as a SalesShipment DTO object.
     *
     * @param string              $guid The unique identifier (GUID) of the sales shipment to update
     * @param array|SalesShipment $data The updated sales shipment data. Can be an array of data
     *                                  or a SalesShipment DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $salesShipmentGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'TrackingNumber' => 'TRK987654321',
     *     'Carrier' => 'UPS',
     *     'Status' => 'In Transit'
     * ];
     * $response = $salesShipmentsService->update($salesShipmentGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|SalesShipment $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $salesshipment = SalesShipment::fromArray($data);
        } else {
            $salesshipment = $data;
        }

        $response = $this->client->put("/SalesShipments/{$guid}", $salesshipment->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a sales shipment from the Unleashed system.
     *
     * This method permanently removes a sales shipment from the Unleashed system.
     * Note: Deleting a sales shipment may affect related inventory, sales orders, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the sales shipment to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesShipmentGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $salesShipmentsService->delete($salesShipmentGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/SalesShipments/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }
}
