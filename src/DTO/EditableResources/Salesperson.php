<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Salesperson Data Transfer Object - Represents salespersons in the system
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/Salespersons
 */
class Salesperson extends BaseDto
{
    // Salesperson properties
        /**
         * @var string|null SalespersonCode
         */
    public ?string $SalespersonCode = null;
        /**
         * @var string|null SalespersonName
         */
    public ?string $SalespersonName = null;
        /**
         * @var string|null FullName
         */
    public ?string $FullName = null;
        /**
         * @var string|null Email
         */
    public ?string $Email = null;
        /**
         * @var string|null PhoneNumber
         */
    public ?string $PhoneNumber = null;
        /**
         * @var bool|null Obsolete
         */
    public ?bool $Obsolete = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Simple getters
        /**
         * Get the SalespersonCode
         *
         * @return string|null The SalespersonCode
         */
    public function getSalespersonCode(): ?string
    {
        return $this->SalespersonCode;
    }

        /**
         * Get the SalespersonName
         *
         * @return string|null The SalespersonName
         */
    public function getSalespersonName(): ?string
    {
        return $this->SalespersonName;
    }

        /**
         * Get the FullName
         *
         * @return string|null The FullName
         */
    public function getFullName(): ?string
    {
        return $this->FullName;
    }

        /**
         * Get the Email
         *
         * @return string|null The Email
         */
    public function getEmail(): ?string
    {
        return $this->Email;
    }

    // Simple setters
        /**
         * Set the SalespersonCode
         *
         * @param string|null $salespersonCode The SalespersonCode
         */
    public function setSalespersonCode(?string $salespersonCode): void
    {
        $this->SalespersonCode = $salespersonCode;
    }

        /**
         * Set the SalespersonName
         *
         * @param string|null $salespersonName The SalespersonName
         */
    public function setSalespersonName(?string $salespersonName): void
    {
        $this->SalespersonName = $salespersonName;
    }

        /**
         * Set the FullName
         *
         * @param string|null $fullName The FullName
         */
    public function setFullName(?string $fullName): void
    {
        $this->FullName = $fullName;
    }

        /**
         * Set the Email
         *
         * @param string|null $email The Email
         */
    public function setEmail(?string $email): void
    {
        $this->Email = $email;
    }
}
