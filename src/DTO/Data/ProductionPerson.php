<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Production Person Data Transfer Object
 *
 * Represents production personnel assigned to assemblies in the Unleashed system.
 * These are the people responsible for performing assembly work.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/Assemblies
 */
class ProductionPerson extends BaseDto
{
    /**
     * Production Person properties
     */

    /**
     * @var string|null Production person name
     */
    public ?string $Name = null;

    /**
     * @var string|null Production person email
     */
    public ?string $Email = null;

    /**
     * @var string|null Production person phone
     */
    public ?string $PhoneNumber = null;

    /**
     * @var string|null Production person department
     */
    public ?string $Department = null;

    /**
     * @var bool|null Whether the person is active
     */
    public ?bool $IsActive = null;

    /**
     * @var string|null User who created the record
     */
    public ?string $CreatedBy = null;

    /**
     * @var string|null User who last modified the record
     */
    public ?string $LastModifiedBy = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the production person name
     *
     * @return string|null The name
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * Get the production person email
     *
     * @return string|null The email
     */
    public function getEmail(): ?string
    {
        return $this->Email;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the production person name
     *
     * @param string|null $name The name
     */
    public function setName(?string $name): void
    {
        $this->Name = $name;
    }

    /**
     * Set the production person email
     *
     * @param string|null $email The email
     */
    public function setEmail(?string $email): void
    {
        $this->Email = $email;
    }
}
