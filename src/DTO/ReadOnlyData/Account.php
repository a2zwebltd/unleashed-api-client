<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Account Data Transfer Object - Represents chart of accounts
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Accounts
 */
class Account extends BaseDto
{
    // Account properties
        /**
         * @var string|null AccountCode
         */
    public ?string $AccountCode = null;
        /**
         * @var string|null AccountName
         */
    public ?string $AccountName = null;
        /**
         * @var string|null AccountType
         */
    public ?string $AccountType = null;
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

    // API Documentation fields
        /**
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var string|null AccountClass
         */
    public ?string $AccountClass = null;
        /**
         * @var bool|null IsSystemAccount
         */
    public ?bool $IsSystemAccount = null;
        /**
         * @var string|null ParentAccountCode
         */
    public ?string $ParentAccountCode = null;
        /**
         * @var bool|null IsActive
         */
    public ?bool $IsActive = null;

    // Simple getters
        /**
         * Get the AccountCode
         *
         * @return string|null The AccountCode
         */
    public function getAccountCode(): ?string
    {
        return $this->AccountCode;
    }

        /**
         * Get the AccountName
         *
         * @return string|null The AccountName
         */
    public function getAccountName(): ?string
    {
        return $this->AccountName;
    }

        /**
         * Get the AccountType
         *
         * @return string|null The AccountType
         */
    public function getAccountType(): ?string
    {
        return $this->AccountType;
    }

    // Simple setters
        /**
         * Set the AccountCode
         *
         * @param string|null $accountCode The AccountCode
         */
    public function setAccountCode(?string $accountCode): void
    {
        $this->AccountCode = $accountCode;
    }

        /**
         * Set the AccountName
         *
         * @param string|null $accountName The AccountName
         */
    public function setAccountName(?string $accountName): void
    {
        $this->AccountName = $accountName;
    }

        /**
         * Set the AccountType
         *
         * @param string|null $accountType The AccountType
         */
    public function setAccountType(?string $accountType): void
    {
        $this->AccountType = $accountType;
    }

    // API Documentation getters
        /**
         * Get the Description
         *
         * @return string|null The Description
         */
    public function getDescription(): ?string
    {
        return $this->Description;
    }
        /**
         * Get the AccountClass
         *
         * @return string|null The AccountClass
         */
    public function getAccountClass(): ?string
    {
        return $this->AccountClass;
    }
        /**
         * Get the IsSystemAccount
         *
         * @return bool|null The IsSystemAccount
         */
    public function getIsSystemAccount(): ?bool
    {
        return $this->IsSystemAccount;
    }
        /**
         * Get the ParentAccountCode
         *
         * @return string|null The ParentAccountCode
         */
    public function getParentAccountCode(): ?string
    {
        return $this->ParentAccountCode;
    }
        /**
         * Get the IsActive
         *
         * @return bool|null The IsActive
         */
    public function getIsActive(): ?bool
    {
        return $this->IsActive;
    }

    // API Documentation setters
        /**
         * Set the Description
         *
         * @param string|null $description The Description
         */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }
        /**
         * Set the AccountClass
         *
         * @param string|null $accountClass The AccountClass
         */
    public function setAccountClass(?string $accountClass): void
    {
        $this->AccountClass = $accountClass;
    }
        /**
         * Set the IsSystemAccount
         *
         * @param bool|null $isSystemAccount The IsSystemAccount
         */
    public function setIsSystemAccount(?bool $isSystemAccount): void
    {
        $this->IsSystemAccount = $isSystemAccount;
    }
        /**
         * Set the ParentAccountCode
         *
         * @param string|null $parentAccountCode The ParentAccountCode
         */
    public function setParentAccountCode(?string $parentAccountCode): void
    {
        $this->ParentAccountCode = $parentAccountCode;
    }
        /**
         * Set the IsActive
         *
         * @param bool|null $isActive The IsActive
         */
    public function setIsActive(?bool $isActive): void
    {
        $this->IsActive = $isActive;
    }
}
