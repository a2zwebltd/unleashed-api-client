<?php

/**
 * Unleashed API Client
 *
 * This file contains the UnleashedClient class which is the main client
 * for interacting with the Unleashed Software API. It handles authentication,
 * HTTP requests, and error handling.
 *
 * @category API
 * @package  Unleashed\ApiClient\Client
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/
 */

declare(strict_types=1);

namespace Unleashed\ApiClient\Client;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Unleashed\ApiClient\Exceptions\ApiException;
use Unleashed\ApiClient\Exceptions\AuthenticationException;

/**
 * Unleashed API Client
 *
 * Main client class for interacting with the Unleashed Software API.
 * Handles authentication, HTTP requests, and error handling.
 *
 * @category API
 * @package  Unleashed\ApiClient\Client
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/
 * @version  Release: 1.0.0
 */
class UnleashedClient
{
    /**
     * HTTP client for making API requests
     *
     * @var GuzzleClient
     */
    private GuzzleClient $httpClient;

    /**
     * API ID for authentication
     *
     * @var string
     */
    private string $apiId;

    /**
     * API key for authentication
     *
     * @var string
     */
    private string $apiKey;

    /**
     * Client type identifier
     *
     * @var string
     */
    private string $clientType;

    /**
     * Base URL for the API
     *
     * @var string
     */
    private string $baseUrl;

    /**
     * Constructor for UnleashedClient
     *
     * @param string $apiId      The API ID for authentication
     * @param string $apiKey     The API key for authentication
     * @param string $clientType The client type identifier
     * @param string $baseUrl    The base URL for the API (defaults to production)
     */
    public function __construct(
        string $apiId,
        string $apiKey,
        string $clientType,
        string $baseUrl = 'https://api.unleashedsoftware.com'
    ) {
        $this->apiId = $apiId;
        $this->apiKey = $apiKey;
        $this->clientType = $clientType;
        $this->baseUrl = $baseUrl;
        $this->httpClient = new GuzzleClient(
            [
            'base_uri' => $baseUrl,
            'timeout' => 30,
            'connect_timeout' => 10,
            ]
        );
    }

    /**
     * Make a GET request to the API
     *
     * @param string $endpoint    The API endpoint to call
     * @param array  $queryParams Query parameters to include in the request
     *
     * @return array The API response data
     * @throws ApiException When the API request fails
     * @throws AuthenticationException When authentication fails
     */
    public function get(string $endpoint, array $queryParams = []): array
    {
        return $this->request(
            'GET',
            $endpoint,
            [
            'query' => $queryParams,
            ]
        );
    }

    /**
     * Make a POST request to the API
     *
     * @param  string $endpoint The API endpoint to call
     * @param  array  $data     The data to send in the request body
     * @return array The API response data
     * @throws ApiException When the API request fails
     * @throws AuthenticationException When authentication fails
     */
    public function post(string $endpoint, array $data = []): array
    {
        return $this->request(
            'POST',
            $endpoint,
            [
            'json' => $data,
            ]
        );
    }

    /**
     * Make a PUT request to the API
     *
     * @param  string $endpoint The API endpoint to call
     * @param  array  $data     The data to send in the request body
     * @return array The API response data
     * @throws ApiException When the API request fails
     * @throws AuthenticationException When authentication fails
     */
    public function put(string $endpoint, array $data = []): array
    {
        return $this->request(
            'PUT',
            $endpoint,
            [
            'json' => $data,
            ]
        );
    }

    /**
     * Make a DELETE request to the API
     *
     * @param  string $endpoint The API endpoint to call
     * @return array The API response data
     * @throws ApiException When the API request fails
     * @throws AuthenticationException When authentication fails
     */
    public function delete(string $endpoint): array
    {
        return $this->request('DELETE', $endpoint);
    }

    /**
     * Make a request to the API with proper authentication
     *
     * @param  string $method   The HTTP method (GET, POST, PUT, DELETE)
     * @param  string $endpoint The API endpoint to call
     * @param  array  $options  Additional options for the request
     * @return array The API response data
     * @throws ApiException When the API request fails
     * @throws AuthenticationException When authentication fails
     */
    private function request(string $method, string $endpoint, array $options = []): array
    {
        $queryString = $this->buildQueryString($options['query'] ?? []);
        $signature = $this->generateSignature($queryString);

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'api-auth-id' => $this->apiId,
            'api-auth-signature' => $signature,
            'client-type' => $this->clientType,
        ];

        $options['headers'] = array_merge($options['headers'] ?? [], $headers);

        try {
            $response = $this->httpClient->request($method, $endpoint, $options);
            $body = $response->getBody()->getContents();

            return json_decode($body, true) ?? [];
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response === null) {
                throw new ApiException('Request failed: ' . $e->getMessage(), 0, $e);
            }

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            $responseData = json_decode($body, true) ?? [];

            if ($statusCode === 401) {
                throw new AuthenticationException('Authentication failed', $responseData);
            }

            throw new ApiException(
                $responseData['Description'] ?? 'API request failed',
                0,
                $e,
                $statusCode,
                $responseData
            );
        } catch (GuzzleException $e) {
            throw new ApiException('Network error: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Build query string from parameters
     *
     * @param  array $params The parameters to build into a query string
     * @return string The formatted query string
     */
    private function buildQueryString(array $params): string
    {
        if (empty($params)) {
            return '';
        }

        // Sort parameters for consistent signature generation
        ksort($params);

        return http_build_query($params);
    }

    /**
     * Generate HMAC-SHA256 signature for authentication
     *
     * @param  string $queryString The query string to sign
     * @return string The base64-encoded HMAC-SHA256 signature
     */
    private function generateSignature(string $queryString): string
    {
        return base64_encode(hash_hmac('sha256', $queryString, $this->apiKey, true));
    }


    /**
     * Get the base URL being used
     *
     * @return string The base URL for the API
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
