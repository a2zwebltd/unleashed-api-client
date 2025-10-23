<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\SalesInvoice;

/**
 * Service class for managing SalesInvoice operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with SalesInvoice resources,
 * allowing retrieval of sales invoice information. Sales invoices represent
 * bills sent to customers for goods or services provided, containing details
 * about the transaction, customer information, line items, and payment terms.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class SalesInvoicesService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new SalesInvoicesService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all sales invoices from the Unleashed API.
     *
     * This method fetches all available sales invoices from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'InvoiceNumber']
     *
     * @return SalesInvoice[] An array of SalesInvoice objects representing all sales invoices.
     *                        Returns an empty array if no sales invoices are found or if the API response
     *                        doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesInvoicesService = new SalesInvoicesService($client);
     *
     * // Get all sales invoices
     * $salesInvoices = $salesInvoicesService->getAll();
     *
     * // Get sales invoices with filters
     * $filteredSalesInvoices = $salesInvoicesService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'InvoiceNumber'
     * ]);
     *
     * foreach ($salesInvoices as $invoice) {
     *     echo "Invoice: " . $invoice->getInvoiceNumber();
     *     echo "Customer: " . $invoice->getCustomerName();
     *     echo "Total: " . $invoice->getTotal();
     *     echo "Date: " . $invoice->getInvoiceDate();
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Invoices', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return SalesInvoice::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific sales invoice by its GUID.
     *
     * This method fetches a single sales invoice from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the sales invoice to retrieve
     *
     * @return SalesInvoice|null The SalesInvoice object if found, null if the sales invoice doesn't exist
     *                          or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $salesInvoice = $salesInvoicesService->getById('12345678-1234-1234-1234-123456789012');
     * if ($salesInvoice) {
     *     echo "Sales Invoice found: " . $salesInvoice->getInvoiceNumber();
     *     echo "Customer: " . $salesInvoice->getCustomerName();
     *     echo "Total: " . $salesInvoice->getTotal();
     *     echo "Status: " . $salesInvoice->getStatus();
     *     echo "Due Date: " . $salesInvoice->getDueDate();
     * }
     * ```
     */
    public function getById(string $guid): ?SalesInvoice
    {
        $response = $this->client->get("/Invoices/{$guid}");

        if (empty($response)) {
            return null;
        }

        return SalesInvoice::fromArray($response);
    }
}
