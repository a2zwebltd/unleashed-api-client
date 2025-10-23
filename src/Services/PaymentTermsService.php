<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Service class for managing PaymentTerm operations through the Unleashed API.
 *
 * This service provides read-only methods to interact with PaymentTerm resources,
 * allowing retrieval of payment terms information. Payment terms define the
 * conditions under which customers are expected to pay for goods or services,
 * such as "Net 30", "Due on Receipt", "2/10 Net 30", or other credit arrangements.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class PaymentTermsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new PaymentTermsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all payment terms from the Unleashed API.
     *
     * This method fetches all available payment terms from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'PaymentTermCode']
     *
     * @return array An array of payment term data representing all payment terms.
     *               Returns an empty array if no payment terms are found or if the API response
     *               doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $paymentTermsService = new PaymentTermsService($client);
     *
     * // Get all payment terms
     * $paymentTerms = $paymentTermsService->getAll();
     *
     * // Get payment terms with filters
     * $filteredPaymentTerms = $paymentTermsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'PaymentTermCode'
     * ]);
     *
     * foreach ($paymentTerms as $paymentTerm) {
     *     echo "Payment Term: " . $paymentTerm['PaymentTermCode'] . " - " . $paymentTerm['Description'];
     *     echo "Days: " . $paymentTerm['Days'];
     * }
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/PaymentTerms', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return $response['Items'];
    }

    /**
     * Retrieves a specific payment term by its GUID.
     *
     * This method fetches a single payment term from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the payment term to retrieve
     *
     * @return array|null The payment term data if found, null if the payment term doesn't exist
     *                   or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $paymentTerm = $paymentTermsService->getById('12345678-1234-1234-1234-123456789012');
     * if ($paymentTerm) {
     *     echo "Payment Term found: " . $paymentTerm['PaymentTermCode'];
     *     echo "Description: " . $paymentTerm['Description'];
     *     echo "Days: " . $paymentTerm['Days'];
     *     echo "Is Active: " . ($paymentTerm['IsActive'] ? 'Yes' : 'No');
     * }
     * ```
     */
    public function getById(string $guid): ?array
    {
        $response = $this->client->get("/PaymentTerms/{$guid}");

        if (empty($response)) {
            return null;
        }

        return $response;
    }
}
