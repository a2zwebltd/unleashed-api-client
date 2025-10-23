<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\ReadOnlyData\Account;

/**
 * Service class for managing Account operations through the Unleashed API.
 *
 * This service provides methods to interact with Account resources,
 * allowing retrieval of account data from the Unleashed system.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class AccountsService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new AccountsService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all accounts from the Unleashed API.
     *
     * This method fetches all available accounts from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'Name']
     *
     * @return Account[] An array of Account objects representing all accounts.
     *                   Returns an empty array if no accounts are found or if the API response
     *                   doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $accountsService = new AccountsService($client);
     *
     * // Get all accounts
     * $accounts = $accountsService->getAll();
     *
     * // Get accounts with filters
     * $filteredAccounts = $accountsService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'Name'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Accounts', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Account::fromArray($item);
            },
            $response['Items']
        );
    }
}
