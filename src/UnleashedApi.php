<?php

/**
 * Unleashed API Client
 *
 * This file contains the main UnleashedApi class which provides a dynamic
 * service-based interface to the Unleashed Software API. Services are
 * automatically discovered and can be accessed as properties.
 *
 * @category API
 * @package  Unleashed\ApiClient
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com
 */

declare(strict_types=1);

namespace Unleashed\ApiClient;

use Unleashed\ApiClient\Client\UnleashedClient;

/**
 * Main API client for interacting with the Unleashed Software API.
 *
 * This class provides a dynamic service-based interface to the Unleashed API.
 * Services are automatically discovered and can be accessed as properties.
 *
 * @category API
 * @package  Unleashed\ApiClient
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com
 * @since    1.0.0
 *
 * @example
 * ```php
 * $api = new UnleashedApi('your-api-id', 'your-api-key', 'client-type');
 *
 * // Access services dynamically
 * $customers = $api->customers->getAll();
 * $products = $api->products->getById('product-guid');
 * ```
 */
class UnleashedApi
{
    /**
     * The underlying HTTP client for making API requests.
     *
     * @var UnleashedClient
     */
    private UnleashedClient $client;

    /**
     * Cache of instantiated service objects.
     *
     * @var array<string, object>
     */
    private array $services = [];

    /**
     * Mapping of service names to their class names.
     *
     * @var array<string, string>
     */
    private array $serviceMap = [];

    /**
     * Constructs a new UnleashedApi instance.
     *
     * @param string $apiId      Your Unleashed API ID
     * @param string $apiKey     Your Unleashed API Key
     * @param string $clientType The client type (e.g., 'Web', 'Mobile')
     * @param string $baseUrl    The base URL for the API (defaults to production)
     *
     * @example
     * ```php
     * // Production API
     * $api = new UnleashedApi('your-api-id', 'your-api-key', '<account_name>/<app_name>');
     *
     * // Custom base URL (e.g., for testing)
     * $api = new UnleashedApi('your-api-id', 'your-api-key', '<account_name>/<app_name>',
     *                         'https://api-test.unleashedsoftware.com');
     * ```
     */
    public function __construct(
        string $apiId,
        string $apiKey,
        string $clientType,
        string $baseUrl = 'https://api.unleashedsoftware.com'
    ) {
        $this->client = new UnleashedClient($apiId, $apiKey, $clientType, $baseUrl);
    }

    /**
     * Magic method to access services dynamically.
     *
     * This allows you to access services as properties (e.g., $api->customers).
     * Services are automatically discovered from the Services directory.
     *
     * @param string $name The service name (e.g., 'customers', 'products')
     *
     * @return object The service instance
     * @throws \InvalidArgumentException If the service doesn't exist
     *
     * @example
     * ```php
     * $api = new UnleashedApi('id', 'key', '<account_name>/<app_name>');
     *
     * // Access services as properties
     * $customers = $api->customers;  // Returns CustomerService instance
     * $products = $api->products;   // Returns ProductService instance
     * ```
     */
    public function __get(string $name): object
    {
        if (empty($this->serviceMap)) {
            $this->loadServiceMap();
        }

        if (!isset($this->serviceMap[$name])) {
            throw new \InvalidArgumentException("Unknown service: {$name}");
        }

        return $this->getService($this->serviceMap[$name]);
    }

    /**
     * Load service map dynamically from Services directory.
     *
     * This method scans the Services directory for *Service.php files and
     * creates a mapping of service names to their class names. Service names
     * are derived by removing 'Service' from the class name and converting
     * to camelCase.
     *
     * @return void
     *
     * @example
     * ```php
     * // If you have CustomerService.php, it becomes 'customer'
     * // If you have ProductService.php, it becomes 'product'
     * ```
     */
    private function loadServiceMap(): void
    {
        $namespace = 'Unleashed\\ApiClient\\Services\\';
        $dir = __DIR__ . '/Services';

        foreach (glob("$dir/*Service.php") as $file) {
            $class = $namespace . basename($file, '.php');
            $key = lcfirst(str_replace('Service', '', basename($file, '.php')));
            $this->serviceMap[$key] = $class;
        }
    }

    /**
     * Get the underlying HTTP client for custom requests.
     *
     * This allows you to access the UnleashedClient directly for custom
     * API requests that aren't covered by the available services.
     *
     * @return UnleashedClient The underlying HTTP client
     *
     * @example
     * ```php
     * $api = new UnleashedApi('id', 'key', 'Web');
     * $client = $api->getClient();
     *
     * // Make a custom request
     * $response = $client->get('/custom-endpoint');
     * ```
     */
    public function getClient(): UnleashedClient
    {
        return $this->client;
    }

    /**
     * Get or create a service instance.
     *
     * This method implements lazy loading of services. Services are only
     * instantiated when first accessed, and subsequent accesses return
     * the same cached instance.
     *
     * @param string $serviceClass The fully qualified class name of the service
     *
     * @return object The service instance
     *
     * @example
     * ```php
     * // This is called internally when you access $api->customers
     * $service = $this->_getService('Unleashed\\ApiClient\\Services\\CustomerService');
     * ```
     */
    private function getService(string $serviceClass): object
    {
        if (!isset($this->services[$serviceClass])) {
            $this->services[$serviceClass] = new $serviceClass($this->client);
        }

        return $this->services[$serviceClass];
    }
}
