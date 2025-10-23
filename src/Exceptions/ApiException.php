<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Exceptions;

use Exception;
use Throwable;

/**
 * Base exception class for API-related errors in the Unleashed API client.
 *
 * This exception is thrown when API requests fail and provides additional
 * context about the HTTP status code and response data from the API.
 *
 * @package Unleashed\ApiClient\Exceptions
 * @since   1.0.0
 */
class ApiException extends Exception
{
    /**
     * HTTP status code from the API response.
     *
     * @var int|null
     */
    private ?int $statusCode = null;

    /**
     * Response data from the API (typically contains error details).
     *
     * @var array|null
     */
    private ?array $responseData = null;

    /**
     * Constructs a new API exception.
     *
     * @param string         $message      The exception message
     * @param int            $code         The exception code
     * @param Throwable|null $previous     The previous exception for chaining
     * @param int|null       $statusCode   HTTP status code from the API response
     * @param array|null     $responseData Response data from the API
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        ?int $statusCode = null,
        ?array $responseData = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->statusCode = $statusCode;
        $this->responseData = $responseData;
    }

    /**
     * Gets the HTTP status code from the API response.
     *
     * @return int|null The HTTP status code, or null if not set
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Gets the response data from the API.
     *
     * @return array|null The response data array, or null if not set
     */
    public function getResponseData(): ?array
    {
        return $this->responseData;
    }

    /**
     * Creates a new ApiException from an API response.
     *
     * This is a convenience method for creating exceptions from failed API responses.
     * It automatically extracts the error message from the response data if available.
     *
     * @param  int         $statusCode   The HTTP status code from the response
     * @param  array       $responseData The response data from the API
     * @param  string|null $message      Custom error message (optional)
     * @return self A new ApiException instance
     *
     * @example
     * ```php
     * $exception = ApiException::fromResponse(400, [
     *     'message' => 'Invalid request parameters',
     *     'errors' => ['field' => 'is required']
     * ]);
     * ```
     */
    public static function fromResponse(int $statusCode, array $responseData, ?string $message = null): self
    {
        $message = $message ?? $responseData['message'] ?? 'API request failed';

        return new self(
            $message,
            0,
            null,
            $statusCode,
            $responseData
        );
    }
}
