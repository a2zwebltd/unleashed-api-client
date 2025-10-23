<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sales Order Group Data Transfer Object - Represents sales order groups
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SalesOrderGroups
 */
class SalesOrderGroup extends BaseDto
{
        /**
         * @var string|null SalesOrderGroupCode
         */
    public ?string $SalesOrderGroupCode = null;
        /**
         * @var string|null SalesOrderGroupName
         */
    public ?string $SalesOrderGroupName = null;
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
         * @var bool|null IsActive
         */
    public ?bool $IsActive = null;

        /**
         * Get the SalesOrderGroupCode
         *
         * @return string|null The SalesOrderGroupCode
         */
    public function getSalesOrderGroupCode(): ?string
    {
        return $this->SalesOrderGroupCode;
    }
        /**
         * Get the SalesOrderGroupName
         *
         * @return string|null The SalesOrderGroupName
         */
    public function getSalesOrderGroupName(): ?string
    {
        return $this->SalesOrderGroupName;
    }
        /**
         * Set the SalesOrderGroupCode
         *
         * @param string|null $code The SalesOrderGroupCode
         */
    public function setSalesOrderGroupCode(?string $code): void
    {
        $this->SalesOrderGroupCode = $code;
    }
        /**
         * Set the SalesOrderGroupName
         *
         * @param string|null $name The SalesOrderGroupName
         */
    public function setSalesOrderGroupName(?string $name): void
    {
        $this->SalesOrderGroupName = $name;
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
         * Set the IsActive
         *
         * @param bool|null $isActive The IsActive
         */
    public function setIsActive(?bool $isActive): void
    {
        $this->IsActive = $isActive;
    }
}
