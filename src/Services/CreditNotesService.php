<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\CreditNote;

/**
 * Service class for managing CreditNote operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with CreditNote resources,
 * including CRUD operations, credit line management, and credit note completion.
 * Credit notes are used to record refunds, returns, or adjustments to customer accounts,
 * typically issued when goods are returned or services are not provided as expected.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CreditNotesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CreditNotesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all credit notes from the Unleashed API.
     *
     * This method fetches all available credit notes from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CreditNoteNumber']
     *
     * @return CreditNote[] An array of CreditNote objects representing all credit notes.
     *                      Returns an empty array if no credit notes are found or if the API response
     *                      doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNotesService = new CreditNotesService($client);
     *
     * // Get all credit notes
     * $creditNotes = $creditNotesService->getAll();
     *
     * // Get credit notes with filters
     * $filteredCreditNotes = $creditNotesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CreditNoteNumber'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/CreditNotes', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return CreditNote::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific credit note by its GUID.
     *
     * This method fetches a single credit note from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the credit note to retrieve
     *
     * @return CreditNote|null The CreditNote object if found, null if the credit note doesn't exist
     *                         or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNote = $creditNotesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($creditNote) {
     *     echo "Credit Note found: " . $creditNote->getCreditNoteNumber();
     *     echo "Customer: " . $creditNote->getCustomerName();
     * }
     * ```
     */
    public function getById(string $guid): ?CreditNote
    {
        $response = $this->client->get("/CreditNotes/{$guid}");

        if (empty($response)) {
            return null;
        }

        return CreditNote::fromArray($response);
    }

    /**
     * Creates a new credit note in the Unleashed system.
     *
     * This method creates a new credit note with the provided data. The data can be provided
     * either as an array or as a CreditNote DTO object. Uses the FreeCredit endpoint for creation.
     *
     * @param array|CreditNote $data The credit note data to create. Can be an array of data
     *                               or a CreditNote DTO object
     *
     * @return CreditNote The created CreditNote object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create credit note from array
     * $creditNoteData = [
     *     'Customer' => ['Guid' => 'customer-guid-here'],
     *     'CreditNoteNumber' => 'CN-001',
     *     'Total' => 100.00,
     *     'Lines' => [
     *         [
     *             'Product' => ['Guid' => 'product-guid-here'],
     *             'Quantity' => 1,
     *             'UnitPrice' => 100.00
     *         ]
     *     ]
     * ];
     * $newCreditNote = $creditNotesService->create($creditNoteData);
     *
     * // Create credit note from DTO
     * $creditNote = new CreditNote($creditNoteData);
     * $newCreditNote = $creditNotesService->create($creditNote);
     * ```
     */
    public function create(array|CreditNote $data): CreditNote
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $creditnote = CreditNote::fromArray($data);
        } else {
            $creditnote = $data;
        }

        // Use FreeCredit endpoint for creation
        $response = $this->client->post('/CreditNotes/FreeCredit', $creditnote->toArray());

        if (empty($response)) {
        }

        return CreditNote::fromArray($response);
    }

    /**
     * Updates an existing credit note in the Unleashed system.
     *
     * This method updates an existing credit note with the provided data. The data can be provided
     * either as an array or as a CreditNote DTO object.
     *
     * @param string           $guid The unique identifier (GUID) of the credit note to update
     * @param array|CreditNote $data The updated credit note data. Can be an array of data
     *                               or a CreditNote DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'Total' => 150.00,
     *     'Notes' => 'Updated credit note'
     * ];
     * $response = $creditNotesService->update($creditNoteGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|CreditNote $data): array
    {
        if (empty($guid)) {
        }

        // If array, create DTO from it
        if (is_array($data)) {
            $creditnote = CreditNote::fromArray($data);
        } else {
            $creditnote = $data;
        }

        $response = $this->client->put("/CreditNotes/{$guid}", $creditnote->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a credit note from the Unleashed system.
     *
     * This method permanently removes a credit note from the Unleashed system.
     * Note: Deleting a credit note may affect customer account balances and financial reporting.
     *
     * @param string $guid The unique identifier (GUID) of the credit note to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $creditNotesService->delete($creditNoteGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/CreditNotes/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Creates a credit line for an existing credit note.
     *
     * This method adds a credit line to an existing credit note, allowing you to specify
     * the products, quantities, and amounts to be credited.
     *
     * @param string $creditNoteGuid The unique identifier (GUID) of the credit note to add a line to
     * @param array  $lineData       The credit line data containing product information,
     *                               quantities, prices, and other line-specific details
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $lineData = [
     *     'Product' => ['Guid' => 'product-guid-here'],
     *     'Quantity' => 2,
     *     'UnitPrice' => 50.00,
     *     'Description' => 'Returned product'
     * ];
     * $response = $creditNotesService->createCreditLine($creditNoteGuid, $lineData);
     * ```
     */
    public function createCreditLine(string $creditNoteGuid, array $lineData): array
    {
        $response = $this->client->post("/CreditNotes/{$creditNoteGuid}/Lines", $lineData);

        if (empty($response)) {
        }

        return $response;
    }

    /**
     * Updates an existing credit line.
     *
     * This method modifies an existing credit line within a credit note,
     * allowing you to update quantities, prices, or other line properties.
     *
     * @param string $creditNoteGuid The unique identifier (GUID) of the credit note containing the line
     * @param string $creditLineGuid The unique identifier (GUID) of the credit line to update
     * @param array  $lineData       The updated credit line data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $updateData = [
     *     'Quantity' => 3,
     *     'UnitPrice' => 75.00,
     *     'Description' => 'Updated credit line'
     * ];
     * $response = $creditNotesService->updateCreditLine($creditNoteGuid, $lineGuid, $updateData);
     * ```
     */
    public function updateCreditLine(string $creditNoteGuid, string $creditLineGuid, array $lineData): array
    {
        $response = $this->client->put("/CreditNotes/{$creditNoteGuid}/Lines/{$creditLineGuid}", $lineData);

        return $response;
    }

    /**
     * Deletes a credit line from a credit note.
     *
     * This method removes a credit line from an existing credit note.
     *
     * @param string $creditNoteGuid The unique identifier (GUID) of the credit note containing the line
     * @param string $creditLineGuid The unique identifier (GUID) of the credit line to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $lineGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $creditNotesService->deleteCreditLine($creditNoteGuid, $lineGuid);
     * ```
     */
    public function deleteCreditLine(string $creditNoteGuid, string $creditLineGuid): array
    {
        $response = $this->client->delete("/CreditNotes/{$creditNoteGuid}/Lines/{$creditLineGuid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Completes a credit note.
     *
     * This method marks a credit note as completed in the Unleashed system.
     * The completion process may trigger various business rules and workflows,
     * such as updating customer account balances and generating financial reports.
     *
     * @param string $creditNoteGuid The unique identifier (GUID) of the credit note to complete
     *
     * @return bool True if the credit note was successfully completed, false if an error occurred
     *
     * @example
     * ```php
     * $creditNoteGuid = '12345678-1234-1234-1234-123456789012';
     * $success = $creditNotesService->completeCreditNote($creditNoteGuid);
     * if ($success) {
     *     echo "Credit note completed successfully";
     * } else {
     *     echo "Failed to complete credit note";
     * }
     * ```
     */
    public function completeCreditNote(string $creditNoteGuid): bool
    {
        try {
            $this->client->post("/CreditNotes/{$creditNoteGuid}/Complete", []);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
