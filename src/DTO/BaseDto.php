<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO;

use DateTimeInterface;
use JsonSerializable;

/**
 * Base Data Transfer Object for Unleashed API
 *
 * This abstract class provides common functionality for all DTOs including:
 * - System fields (Guid, CreatedOn, LastModifiedOn, etc.)
 * - Serialization/deserialization methods
 * - Type-safe property handling
 *
 * @template T of BaseDto
 * @package Unleashed\ApiClient\DTO
 * @author  Unleashed API Client
 * @version 1.0.0
 */
abstract class BaseDto implements JsonSerializable
{
    /**
     * System fields - common to all Unleashed API entities
     */

    /**
     * @var string|null Unique identifier for the entity
     */
    protected ?string $guid = null;

    /**
     * @var DateTimeInterface|null Date and time when the entity was created
     */
    protected ?DateTimeInterface $createdOn = null;

    /**
     * @var DateTimeInterface|null Date and time when the entity was last modified
     */
    protected ?DateTimeInterface $lastModifiedOn = null;

    /**
     * @var string|null Source identifier for the entity
     */
    protected ?string $sourceId = null;

    /**
     * @var string|null Source variant parent identifier
     */
    protected ?string $sourceVariantParentId = null;

    /**
     * @var string|null Object state identifier
     */
    protected ?string $objectState = null;

    /**
     * Get the unique identifier for the entity
     *
     * @return string|null The GUID of the entity
     */
    public function getGuid(): ?string
    {
        return $this->guid;
    }

    /**
     * Set the unique identifier for the entity
     *
     * @param  string|null $guid The GUID to set
     * @return self
     */
    public function setGuid(?string $guid): void
    {
        $this->guid = $guid;
    }

    /**
     * Get the creation date and time
     *
     * @return DateTimeInterface|null The creation date and time
     */
    public function getCreatedOn(): ?DateTimeInterface
    {
        return $this->createdOn;
    }

    /**
     * Set the creation date and time
     *
     * @param  DateTimeInterface|null $createdOn The creation date and time
     * @return self
     */
    public function setCreatedOn(?DateTimeInterface $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

    /**
     * Get the last modification date and time
     *
     * @return DateTimeInterface|null The last modification date and time
     */
    public function getLastModifiedOn(): ?DateTimeInterface
    {
        return $this->lastModifiedOn;
    }

    /**
     * Set the last modification date and time
     *
     * @param  DateTimeInterface|null $lastModifiedOn The last modification date and time
     * @return self
     */
    public function setLastModifiedOn(?DateTimeInterface $lastModifiedOn): void
    {
        $this->lastModifiedOn = $lastModifiedOn;
    }

    /**
     * Get the source identifier
     *
     * @return string|null The source identifier
     */
    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    /**
     * Set the source identifier
     *
     * @param  string|null $sourceId The source identifier
     * @return self
     */
    public function setSourceId(?string $sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    /**
     * Get the source variant parent identifier
     *
     * @return string|null The source variant parent identifier
     */
    public function getSourceVariantParentId(): ?string
    {
        return $this->sourceVariantParentId;
    }

    /**
     * Set the source variant parent identifier
     *
     * @param  string|null $sourceVariantParentId The source variant parent identifier
     * @return self
     */
    public function setSourceVariantParentId(?string $sourceVariantParentId): void
    {
        $this->sourceVariantParentId = $sourceVariantParentId;
    }

    /**
     * Get the object state
     *
     * @return string|null The object state
     */
    public function getObjectState(): ?string
    {
        return $this->objectState;
    }

    /**
     * Set the object state
     *
     * @param  string|null $objectState The object state
     * @return self
     */
    public function setObjectState(?string $objectState): void
    {
        $this->objectState = $objectState;
    }

    /**
     * Convert the DTO to an array for API requests
     *
     * @return array The DTO data as an associative array
     */
    public function toArray(): array
    {
        $data = [];
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);

            // Check if property is initialized before accessing it
            if ($property->isInitialized($this)) {
                $value = $property->getValue($this);

                if ($value !== null) {
                    $data[$property->getName()] = $value;
                }
            }
        }

        return $data;
    }

    /**
     * Create a DTO instance from an array (API response)
     *
     * @param  array $data The API response data
     * @return T A new instance of the DTO
     */
    public static function fromArray(array $data): static
    {
        /** @phpstan-ignore-next-line */
        $dto = new static();
        $reflection = new \ReflectionClass($dto);

        foreach ($data as $key => $value) {
            // Try exact match first
            if (property_exists($dto, $key)) {
                $reflectionProperty = $reflection->getProperty($key);
                $reflectionProperty->setAccessible(true);
                $reflectionProperty->setValue($dto, $value);
            } else {
                // Try case-insensitive match for common fields
                $lowerKey = strtolower($key);
                if ($lowerKey === 'guid' && property_exists($dto, 'guid')) {
                    $reflectionProperty = $reflection->getProperty('guid');
                    $reflectionProperty->setAccessible(true);
                    $reflectionProperty->setValue($dto, $value);
                } elseif ($lowerKey === 'createdon' && property_exists($dto, 'createdOn')) {
                    $reflectionProperty = $reflection->getProperty('createdOn');
                    $reflectionProperty->setAccessible(true);
                    // Convert date string to DateTime if needed
                    if (is_string($value) && !empty($value)) {
                        // Handle /Date(timestamp)/ format
                        if (preg_match('/\/Date\((\d+)\)\//', $value, $matches)) {
                            $timestamp = intval($matches[1]) / 1000; // Convert from milliseconds to seconds
                            $value = new \DateTime('@' . $timestamp);
                        } else {
                            $value = new \DateTime($value);
                        }
                    }
                    $reflectionProperty->setValue($dto, $value);
                } elseif ($lowerKey === 'lastmodifiedon' && property_exists($dto, 'lastModifiedOn')) {
                    $reflectionProperty = $reflection->getProperty('lastModifiedOn');
                    $reflectionProperty->setAccessible(true);
                    // Convert date string to DateTime if needed
                    if (is_string($value) && !empty($value)) {
                        // Handle /Date(timestamp)/ format
                        if (preg_match('/\/Date\((\d+)\)\//', $value, $matches)) {
                            $timestamp = intval($matches[1]) / 1000; // Convert from milliseconds to seconds
                            $value = new \DateTime('@' . $timestamp);
                        } else {
                            $value = new \DateTime($value);
                        }
                    }
                    $reflectionProperty->setValue($dto, $value);
                }
            }
        }

        return $dto;
    }

    /**
     * JSON serialization for JsonSerializable interface
     *
     * @return array The DTO data as an associative array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
