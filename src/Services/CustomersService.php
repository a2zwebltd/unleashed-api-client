<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Services;

use Unleashed\ApiClient\Client\UnleashedClient;
use Unleashed\ApiClient\DTO\EditableResources\Customer;

/**
 * Service class for managing Customer operations through the Unleashed API.
 *
 * This service provides comprehensive methods to interact with Customer resources,
 * including CRUD operations and customer contact management. Customers represent
 * the entities that purchase products or services from your business, and this
 * service enables full lifecycle management of customer data and relationships.
 *
 * @package Unleashed\ApiClient\Services
 * @since   1.0.0
 */
class CustomersService
{
    /**
     * The Unleashed API client instance.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Constructs a new CustomersService instance.
     *
     * @param UnleashedClient $client The Unleashed API client instance
     */
    public function __construct(UnleashedClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves all customers from the Unleashed API.
     *
     * This method fetches all available customers from the Unleashed system.
     * The results can be filtered using the provided filters array.
     *
     * @param array $filters Optional filters to apply to the API request.
     *                       Common filters include pagination, sorting, and field selection.
     *                       Example: ['pageSize' => 50, 'orderBy' => 'CustomerCode']
     *
     * @return Customer[] An array of Customer objects representing all customers.
     *                   Returns an empty array if no customers are found or if the API response
     *                   doesn't contain the expected 'Items' structure.
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customersService = new CustomersService($client);
     *
     * // Get all customers
     * $customers = $customersService->getAll();
     *
     * // Get customers with filters
     * $filteredCustomers = $customersService->getAll([
     *     'pageSize' => 100,
     *     'orderBy' => 'CustomerCode'
     * ]);
     * ```
     */
    public function getAll(array $filters = []): array
    {
        $response = $this->client->get('/Customers', $filters);

        if (!isset($response['Items'])) {
            return [];
        }

        return array_map(
            function (array $item) {
                return Customer::fromArray($item);
            },
            $response['Items']
        );
    }

    /**
     * Retrieves a specific customer by its GUID.
     *
     * This method fetches a single customer from the Unleashed system using its unique identifier.
     *
     * @param string $guid The unique identifier (GUID) of the customer to retrieve
     *
     * @return Customer|null The Customer object if found, null if the customer doesn't exist
     *                      or if the API response is empty
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customer = $customersService->getById('12345678-1234-1234-1234-123456789012');
     * if ($customer) {
     *     echo "Customer found: " . $customer->getCustomerCode();
     *     echo "Name: " . $customer->getCustomerName();
     * }
     * ```
     */
    public function getById(string $guid): ?Customer
    {
        $response = $this->client->get("/Customers/{$guid}");

        if (empty($response)) {
            return null;
        }

        return Customer::fromArray($response);
    }


    /**
     * Creates a new customer in the Unleashed system.
     *
     * This method creates a new customer with the provided data. The data can be provided
     * either as an array or as a Customer DTO object.
     *
     * @param array|Customer $data The customer data to create. Can be an array of data
     *                             or a Customer DTO object
     *
     * @return Customer The created Customer object with all fields populated from the API response
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * // Create customer from array
     * $customerData = [
     *     'CustomerCode' => 'CUST-001',
     *     'CustomerName' => 'Acme Corporation',
     *     'Email' => 'contact@acme.com',
     *     'Phone' => '+1-555-0123'
     * ];
     * $newCustomer = $customersService->create($customerData);
     *
     * // Create customer from DTO
     * $customer = new Customer($customerData);
     * $newCustomer = $customersService->create($customer);
     * ```
     */
    public function create(array|Customer $data): Customer
    {
        // If array, create DTO from it
        if (is_array($data)) {
            $customer = Customer::fromArray($data);
        } else {
            $customer = $data;
        }

        $response = $this->client->post('/Customers', $customer->toArray());


        // Debug: Log the actual API response
        // echo "DEBUG - Customer API Response: " . json_encode($response, JSON_PRETTY_PRINT) . "\n";

        return Customer::fromArray($response);
    }

    /**
     * Updates an existing customer in the Unleashed system.
     *
     * This method updates an existing customer with the provided data. The data can be provided
     * either as an array or as a Customer DTO object.
     *
     * @param string         $guid The unique identifier (GUID) of the customer to update
     * @param array|Customer $data The updated customer data. Can be an array of data
     *                             or a Customer DTO object
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails or validation errors occur
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'CustomerName' => 'Updated Company Name',
     *     'Email' => 'newemail@company.com'
     * ];
     * $response = $customersService->update($customerGuid, $updateData);
     * ```
     */
    public function update(string $guid, array|Customer $data): array
    {

        // If array, create DTO from it
        if (is_array($data)) {
            $customer = Customer::fromArray($data);
        } else {
            $customer = $data;
        }

        $response = $this->client->put("/Customers/{$guid}", $customer->toArray());

        // For PUT operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Deletes a customer from the Unleashed system.
     *
     * This method permanently removes a customer from the Unleashed system.
     * Note: Deleting a customer may affect related orders, invoices, and other business data.
     *
     * @param string $guid The unique identifier (GUID) of the customer to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $response = $customersService->delete($customerGuid);
     * ```
     */
    public function delete(string $guid): array
    {
        $response = $this->client->delete("/Customers/{$guid}");

        // For DELETE operations, return raw response (even if empty)
        return $response;
    }

    /**
     * Updates a customer using POST method.
     *
     * This method provides an alternative update mechanism using POST instead of PUT.
     * Useful for specific customer update scenarios that require POST semantics.
     *
     * @param string $guid The unique identifier (GUID) of the customer to update
     * @param array  $data The updated customer data as an array
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $updateData = [
     *     'CustomerName' => 'Updated Company Name',
     *     'Email' => 'newemail@company.com'
     * ];
     * $response = $customersService->updatePost($customerGuid, $updateData);
     * ```
     */
    public function updatePost(string $guid, array $data): array
    {
        $response = $this->client->post("/Customers/{$guid}", $data);

        return $response;
    }

    /**
     * Retrieves contacts for a specific customer.
     *
     * This method fetches all contacts associated with a customer, allowing you to
     * manage multiple contact persons for a single customer.
     *
     * @param string $customerGuid The unique identifier (GUID) of the customer to get contacts for
     *
     * @return array An array of contact data for the specified customer
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $contacts = $customersService->getContacts($customerGuid);
     *
     * foreach ($contacts as $contact) {
     *     echo "Contact: " . $contact['Name'] . " - " . $contact['Email'];
     * }
     * ```
     */
    public function getContacts(string $customerGuid): array
    {
        $response = $this->client->get("/Customers/{$customerGuid}/Contacts");

        return $response;
    }

    /**
     * Creates a new contact for a customer.
     *
     * This method adds a new contact person to an existing customer, allowing you to
     * manage multiple contact persons for a single customer.
     *
     * @param string $customerGuid The unique identifier (GUID) of the customer to add a contact to
     * @param array  $contactData  The contact data containing name, email, phone, and other contact details
     *
     * @return array The raw API response from the create operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $contactData = [
     *     'Name' => 'John Smith',
     *     'Email' => 'john.smith@company.com',
     *     'Phone' => '+1-555-0123',
     *     'Position' => 'Purchasing Manager'
     * ];
     * $response = $customersService->createContact($customerGuid, $contactData);
     * ```
     */
    public function createContact(string $customerGuid, array $contactData): array
    {
        $response = $this->client->post("/Customers/{$customerGuid}/Contacts", $contactData);

        return $response;
    }

    /**
     * Updates an existing customer contact.
     *
     * This method modifies an existing contact within a customer,
     * allowing you to update contact information, roles, or other properties.
     *
     * @param string $customerGuid The unique identifier (GUID) of the customer containing the contact
     * @param string $contactGuid  The unique identifier (GUID) of the contact to update
     * @param array  $contactData  The updated contact data
     *
     * @return array The raw API response from the update operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $contactGuid = '87654321-4321-4321-4321-210987654321';
     * $updateData = [
     *     'Name' => 'Jane Smith',
     *     'Email' => 'jane.smith@company.com',
     *     'Phone' => '+1-555-0456'
     * ];
     * $response = $customersService->updateContact($customerGuid, $contactGuid, $updateData);
     * ```
     */
    public function updateContact(string $customerGuid, string $contactGuid, array $contactData): array
    {
        $response = $this->client->put("/Customers/{$customerGuid}/Contacts/{$contactGuid}", $contactData);

        return $response;
    }

    /**
     * Deletes a customer contact.
     *
     * This method removes a contact from a customer.
     *
     * @param string $customerGuid The unique identifier (GUID) of the customer containing the contact
     * @param string $contactGuid  The unique identifier (GUID) of the contact to delete
     *
     * @return array The raw API response from the delete operation
     *
     * @throws \Unleashed\ApiClient\Exceptions\ApiException If the API request fails
     *
     * @example
     * ```php
     * $customerGuid = '12345678-1234-1234-1234-123456789012';
     * $contactGuid = '87654321-4321-4321-4321-210987654321';
     * $response = $customersService->deleteContact($customerGuid, $contactGuid);
     * ```
     */
    public function deleteContact(string $customerGuid, string $contactGuid): array
    {
        $response = $this->client->delete("/Customers/{$customerGuid}/Contacts/{$contactGuid}");

        return $response;
    }
}
