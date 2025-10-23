<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Exceptions;

/**
 * Exception thrown when authentication with the Unleashed API fails.
 *
 * This exception is specifically for authentication-related errors such as
 * invalid API credentials, expired tokens, or insufficient permissions.
 * It extends ApiException and automatically sets the HTTP status code to 401.
 *
 * @package Unleashed\ApiClient\Exceptions
 * @since   1.0.0
 */
class AuthenticationException extends ApiException
{
    /**
     * Constructs a new AuthenticationException.
     *
     * @param string     $message  The exception message (defaults to 'Authentication failed')
     * @param int        $code     The exception code (defaults to 401)
     * @param array|null $response Optional response data from the API
     *
     * @example
     * ```php
     * // Basic authentication failure
     * throw new AuthenticationException();
     *
     * // Custom message with response data
     * throw new AuthenticationException(
     *     'Invalid API key provided',
     *     401,
     *     ['error' => 'invalid_credentials']
     * );
     * ```
     */
    public function __construct(string $message = 'Authentication failed', int $code = 401, ?array $response = null)
    {
        parent::__construct($message, $code, null, 401, $response);
    }
}
